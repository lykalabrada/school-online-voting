
<?php

    session_start();
    require_once ('dbconnect.php');

    ////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
    error_reporting(0);
    @ini_set(‘display_errors’, 0);


    // retrieve the username and password sent from login form
    // First we remove all HTML-tags and PHP-tags, then we create a md5-hash
    // This step will make sure the script is not vurnable to sql injections.

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Now let us look for the user in the database.
    $query = sprintf("SELECT * FROM users a left join voter_election b on a.username=b.username WHERE a.email = '%s' AND a.password = '%s' LIMIT 1;",
        mysql_real_escape_string($username), mysql_real_escape_string($password));
    $result = mysql_query($query);
    //echo $query;
    // If the database returns a 0 as result we know the login information is incorrect.
    // If the database returns a 1 as result we know  the login was correct and we proceed.
    // If the database returns a result > 1 there are multple users
    // with the same username and password, so the login will fail.
    if (mysql_num_rows($result) > 0)
    {
        // Login was successfull
        while ($row = mysql_fetch_assoc($result)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = ucfirst(strtolower($row['username']));
            $_SESSION['email'] = strtolower($row['email']);
            //$_SESSION['fullname'] = $row['fullname'];
            $_SESSION['fname'] = ucfirst(strtolower($row['user_fname']));
            $_SESSION['lname'] = ucfirst(strtolower($row['user_lname']));
            $_SESSION['mi'] = strtoupper($row['user_mi']);          

            if(strtolower($row['role']) == 'admin'){
                //header("Location: ./admin.php");
                //echo "./admin.php";
                echo "admin";
            }
            else if(strtolower($row['role']) == 'comsel' || strtolower($row['role']) == 'faculty'){
                $_SESSION['voter_electionId'] = $row['election_id'];
                $_SESSION['comsel_electionId'] = $row['election_id'];
                //header("Location: ./comsel.php");
                echo "comsel";
            }
            else if(strtolower($row['role']) == 'voter'){
                //header("Location: ./vote-page.php");
                $_SESSION['voter_electionId'] = $row['election_id'];
                echo "voter";
            }
            else
            {
                echo "invalid";
            }
        }        
    } else {                    
        // invalid login information
        echo "Invalid email or password.";
        //show the loginform again.
        //include "loginform.php";
        session_destroy();
    }
 
?>