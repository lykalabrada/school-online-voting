<?php

////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

  require_once ('dbconnect.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $electionId = $_POST['electionId'];
    $studentId = $_POST['studentId'];
    $fname =  $_POST['fname'];
    $lname =  $_POST['lname'];
    $mi =  $_POST['mi'];
    $course = $_POST['course'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    $query = "Update users set user_fname='$fname',user_lname='$lname',user_mi='$mi', email='$email' where username='$studentId';";
    $result = mysql_query($query);
    //echo $query;

    $query2 = "Update student_list set student_fname='$fname',student_lname='$lname',student_mi='$mi', student_course='$course', student_email='$email' where student_id='$studentId';";
    $result2 = mysql_query($query2);

    if(strtolower($role) == 'comsel')
    { 
        $chk_com = "SELECT * FROM voter_election where username = '$studentId' and role='comsel' LIMIT 1";
        $com_res = mysql_query($chk_com);
        if($com_res === FALSE)
        {
            die(mysql_error());
        }
        else
        { 
            if(mysql_num_rows($com_res)>0)
            { 
                while($row = mysql_fetch_array($com_res)){
                    $query_com = "Update voter_election set role='voter' where username = $studentId and election_id = {$row['election_id']}";
                    $res = mysql_query($query_com);    
                }
            }
        }
    }
    $query3 = "Update voter_election set role='$role' where username = $studentId and election_id = $electionId";
    $result3 = mysql_query($query3);    
    
    
    

    /*if($result)
    {     
      header('Location: admin.php');
    }
    else
      return false;*/
  }
?>