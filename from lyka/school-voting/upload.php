<?php
////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

  require_once ('dbconnect.php');
  $electionId = $_GET['elect'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( isset($_FILES["file"])) {
      $name = $_FILES["file"]["name"];
      $ext = end((explode(".", $name)));
      $error = false;

      //if there was an error uploading the file
      if(empty($_FILES["file"]["name"]))
        echo "No file chosen!";  
      else if ($_FILES["file"]["error"] > 0)
        echo "Something went wrong. Please contact your administrator.<br />";
      else if($ext != 'csv')
        echo "Incorrect file type!";
      else { //file is finally valid

        /*/Print file details (for debugging purposes)
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/
        
        //Store file in directory "upload" with the name of "uploaded_file.txt"
        $storagename = $_FILES["file"]["name"].".csv";
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);

        if ( $file = fopen( "upload/" . $storagename , 'r' ) ) {
          //echo "File opened.<br />";
          $firstline = fgets ($file, 4096 );
          //Gets the number of fields, in CSV-files the names of the fields are mostly given in the first line
          $num = strlen($firstline) - strlen(str_replace(";", "", $firstline));

          //save the different fields of the firstline in an array called fields
          $fields = array();
          $fields = explode( ";", $firstline, ($num+1) );

          $line = array();
          $i = 0;

          $users = array();
          $students = array();
          $voter_per_election = array();

          //CSV: one line is one record and the cells/fields are seperated by ";"
          //so $dsatz is an two dimensional array saving the records like this: $dsatz[number of record][number of cell]
          while ( $line[$i] = fgets ($file, 4096) ) {
            $dsatz[$i] = array();
            $dsatz[$i] = explode( ";", $line[$i], ($num+1) );

            $i++;
          }

          /*this forloop should check if columns in the file is correct (StudentId,Email,Fullname,Course,Year)* /
          for ( $k = 0; $k != ($num+1); $k++ ) {
            //echo "<td>" . $fields[$k] . "</td>"; //top row
            $topRow = explode(',',$fields[$k]);
            if($topRow[0] != 'StudentId'){ echo "1"; }
            else if($topRow[1] != 'Email'){ echo "2"; }
            else if($topRow[2] != 'Fullname'){ echo "3"; }
            else if($topRow[3] != 'Course'){ echo "4"; }
            //else if($topRow[4] != 'Year') { echo $topRow[5]; echo " - 6"; }
              /*echo "Oops! File doesn't matched the format required.";
              echo "<pre>";
              print_r($topRow);
              echo "</pre>";
            }* /
          }*/

          foreach ($dsatz as $key => $number) {
            foreach ($number as $k => $content) {
              $data = explode(',',$content);
              $student_id = trim($data[1]);
              $pass = strtolower($data[3]).strtolower($data[1]);

              if($student_id !="")
              {
                $chk = "Select * from student_list where student_id=$student_id;";
                $exists = mysql_query($chk);
                if(mysql_num_rows($exists)>0)
                { //update
                  $studentUpdate = "UPDATE student_list SET student_fname='{$data[2]}', student_lname='{$data[3]}', student_mi='{$data[4]}', student_course='{$data[5]}', student_email='{$data[8]}'
                                    WHERE student_id = $student_id;";
                  mysql_query($studentUpdate);

                  $userUpdate = "UPDATE users SET email='{$data[8]}', user_fname='{$data[2]}', user_lname='{$data[3]}', user_mi='{$data[4]}', password='{$pass}'
                                  WHERE username = $student_id";
                  mysql_query($userUpdate);

                  $chkV = "SELECT * from voter_election WHERE username = $student_id and election_id=$electionId";
                  $Vexists = mysql_query($chkV);
                  if(mysql_num_rows($Vexists)<=0)
                  {
                    //then insert user per election
                    $voterInsertt = "INSERT INTO voter_election (username, election_id, role) VALUES ($student_id,$electionId,'voter')";
                    $voterResultt = mysql_query($voterInsertt);
                    if($voterResultt === FALSE)
                      $error = true;
                  }
                  else
                  {
                    $voterUpdate = "UPDATE voter_election SET role='voter' WHERE username=$student_id and election_id=$electionId;";
                    $voterU = mysql_query($voterUpdate);
                    if($voterU === FALSE)
                      $error = true;
                  }
                }
                else
                { 
                  //insert to student_list table
                  $studentInsert = "INSERT INTO student_list (student_id, student_fname, student_lname, student_mi, student_course, student_email) VALUES ($student_id,'{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}','{$data[8]}');";
                  $studentResult = mysql_query($studentInsert);
                  if($studentResult === FALSE)
                    $error = true;

                  //then insert to users table
                  $userInsert = "INSERT INTO users (username, email, user_fname, user_lname, user_mi, password) VALUES ($student_id,'{$data[8]}','{$data[2]}','{$data[3]}','{$data[4]}','{$pass}');";
                  $userResult = mysql_query($userInsert);
                  if($userResult === FALSE)
                    $error = true;

                  //then insert user per election
                  $voterInsert = "INSERT INTO voter_election (username, election_id, role) VALUES ($student_id,$electionId,'voter')";
                  $voterResult = mysql_query($voterInsert);
                  if($voterResult === FALSE)
                    $error = true;
                }
              }
            }
          }  

          if($error == true) { 
            echo "Something went wrong!";
            //die(mysql_error()); // TODO: better error handling
          }
          else {
            echo "Success!";
          }
        }//end of file open

      }//end of file valid

    }//end of if file is set
    else
      echo "No file selected <br />";

  }//end of upload POST
  else
  {
    echo "Something went wrong!";
  }

?>