<?php 

////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

// Start a session
session_start();
require_once('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Ronnel Sanchez">
    <link rel="icon" href="../../favicon.ico">

    <title>Login | GIC - Voting System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/voting-ronnelsanchez.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    <div class="container-fluid">
        <div class="row">
        <!--Login-->
         <div id="login" class="col-xs-12 col-md-8 col-lg-8">
            <div class="login-panel">
              <div class="login-header">
                <div class="row">
                  <div class="col-xs-6">
                  <img src="images/school-logo.png" width="125" alt="">
                  </div>
                </div>
              </div>
              <div class="login-table">
                <div class="login-table-cell">
                  <div class="login-panel-content">
                    <h1>Sign in your Account</h1>
                    <p>Enter you details below.</p>
                  </div>
                  <div id="errorMsg"></div>
                  <form class="form-horizontal" method="post" id="loginform" name="loginform" action="">
                    <div class="form-group">
                      
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Email</label>
                        <input type="email" id="username" name="username" class="form-control input-lg" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Password</label>
                        <input type="password" id="password" name="password" class="form-control input-lg"  placeholder="Password">
                      </div>
                    </div>
                    <br />
                    <div class="form-group">
                      <div class="col-sm-12 text-center">
                        <button class="btn btn-xl btn-primary" id="loginBtn">Sign in</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--End Login-->
          <!--Promo-->
          <div id="promo" class="promo-1 hidden-xs hidden-sm col-md-4 col-lg-4 ">
               <div class="login-panel">
               </div>
          </div>
          <!--End Promo-->
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.form.js"></script>
    <script type="text/javascript">
      $('#loginBtn').click(function(e){
        e.preventDefault();
        if($("#password").val() == "" || $("#username").val() == "")
          $('#errorMsg').html("<b><p style='color:red;'>Please input username and password.</p></b>");
        else
        {
          $('#loginform').ajaxSubmit({
              type: "POST",
              url: "action_page.php",
              data: $('#loginform').serialize(),
              cache: false,
              success: function (response) { console.log(response);
                if(response.trim() == "admin")
                  location.href = "./admin.php";
                else if(response.trim() == "comsel")
                  location.href = "./comsel.php";
                else if(response.trim() == "voter")
                  location.href = "./index.php";
                else if(response.trim() == "invalid")
                  $('#errorMsg').html("<b><p style='color:red;'>Your account is invalid. Please check your with your administrator.</p></b>");
                else
                  $('#errorMsg').html("<b><p style='color:red;'>"+response+"</p></b>");
              }
          });
        }
        
      });
    </script>

  </body>
</html>
