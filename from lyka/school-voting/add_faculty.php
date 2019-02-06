<?php
  require_once ('dbconnect.php');
  require 'PHPMailer/PHPMailerAutoload.php';  

  ////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
  error_reporting(0);
  @ini_set(‘display_errors’, 0);

  $electionId = $_GET['elect'];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $res = "";
    $username = $_POST['fac_username'];
    $fname = $_POST['fac_fname'];
    $mi = $_POST['fac_mi'];
    $lname = $_POST['fac_lname'];
    $email = $_POST['fac_email'];

    $pass = $lname.$username;

    $chk = "Select * from users where username=$username;";
    $exists = mysql_query($chk);
    if(mysql_num_rows($exists)>0)
    { //update
      $update = "UPDATE users SET user_lname='{$lname}', user_fname='{$fname}', user_mi='{$mi}', email='{$email}' WHERE Username = $username;";
      $res_up = mysql_query($update);
      if($res_up === FALSE)
        $res = "error";
    }
    else
    {
      $query = "INSERT INTO users (username, user_lname, user_mi, user_fname, email, password) 
                      VALUES ('{$username}','{$lname}','{$mi}','{$fname}','{$email}', '{$pass}')";
      $result = mysql_query($query);
      if($result === FALSE)
        $res = "error";
    }
    

    $query2 = "INSERT INTO voter_election (username, election_id, role) 
                      VALUES ('{$username}',$electionId,'faculty')";
    $result2 = mysql_query($query2);
    if($result2 === FALSE)
      $res = "error";

    if($res != "error")
    {
      $query_el = "SELECT * FROM election c where c.election_id=$electionId";
      $result_el = mysql_query($query_el);
      if($result_el === FALSE)
        die(mysql_error());     

      while($row = mysql_fetch_array($result_el)){
        if($email != '')
        {
          $startdate=date_create($row['start_date']);
          $enddate=date_create($row['end_date']);
          $mail = new PHPMailer;
          $mail->isSMTP();                                   // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                            // Enable SMTP authentication
          $mail->Username = 'gic.studentvotingsystem@gmail.com';          // SMTP username
          $mail->Password = 'gicvoting'; // SMTP password
          $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                 // TCP port to connect to

          $mail->setFrom('gic.studentvotingsystem@gmail.com', 'GIC Student Online Voting System');
          $mail->addReplyTo('gic.studentvotingsystem@gmail.com', 'GIC Student Online Voting System');
              
          $mail->addAddress($email);   // Add a recipient
          //$mail->addCC('admin@gic.com');
          //$mail->addBCC('bcc@example.com');

          $mail->isHTML(true);  // Set email format to HTML

          $bodyContent = '<div style="background:#fafafa url(https://s17.postimg.org/qt3fkw9pb/image.gif);background-position:right top;background-repeat:repeat-x;font-family:Open Sans, open-sans, sans-serif;font-size:16px;margin:0;padding:0 20px">
            <table align="center" style="width:100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <!--Main TR-->
                <tr>
                    <!--Main TD-->
                  <td align="center" style="padding-left:0px;padding-right:0px">
                    <table align="center" style="max-width:600px;width:100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                              <tr>
                                <td align="left">
                                    <img alt="" style="display:block;height:auto; background-color: #ffffff; border-radius: 0 0 4px 4px;" border="0" src="https://s17.postimg.org/4kcksqqof/school-logo.png" title="" width="125">
                                </td>
                                <td align="right">
                                  
                                </td>
                              </tr>
                            </tbody>
                            </table>
                            
                            <table align="center" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;width:100%">
                              <tbody>
                              <tr>
                                <td>
                                <div style="font-family:Open Sans, open-sans, sans-serif;font-weight:normal;text-decoration:none; color: #ffffff; font-size: 28px;text-align: center;">
                                <h1>'.$row['election_name'].'</h1>
                                <p style="font-size: 21px;">Voting Start <b style="color: #fbc02d;">'.date_format($startdate,"F d Y").'</b> till <b style="color: #fbc02d;">'.date_format($enddate,"F d Y").'</b> </p> 
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td bgcolor="#FFFFFF" style="padding-top:50px;padding-right:50px;padding-left:50px;padding-bottom:50px;border-top:1px solid #dddddd;border-left:1px solid #dddddd;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd">
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td align="center" dir="ltr" style="padding-bottom:15px;font-size:18px;line-height:32px;color:#263238">
                                          <center>
                                          <p style="font-size: 21px;margin: 0;">To vote, please go to this site</p> <br><a href="localhost/school-voting/login.php">GIC Online Voting</a> <br><br> 
                                          </center>
                                          <div style="border: 2px solid #fafafa;"></div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td align="initial" dir="ltr" style="text-align:center;padding-bottom:22px;font-weight:normal;font-size:21px;line-height:26px;">
                                          <p>You have been added as a new COMSEL.</p>
                                          <p>Below are your account details:</p>
                                          Email : <b>'.$email.'</b><br>
                                          Password : <b>'.$pass.'</b>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-bottom:100px;font-size:0px;line-height:0px">&nbsp;</td>
                              </tr>
                            </tbody>
                          </table>                        
                          
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>';

          $mail->Subject = '['.$row['election_name'].'] Account Details';
          $mail->Body = $bodyContent;
          if(!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
              echo 'Message has been sent';
          }
        }
      }
    }
    else
    {
      echo $res;
    }
  }


 ?>