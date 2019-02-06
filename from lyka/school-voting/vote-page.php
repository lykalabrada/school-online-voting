<?php

  ////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
  error_reporting(0);
  @ini_set(‘display_errors’, 0);

  require_once ('dbconnect.php');
  session_start();
  if($_SESSION['voter_electionId'] == '')
    header("Location: login.php");
  $GLOBALS['voter_electionId'] = $_SESSION['voter_electionId'];
  
  $sel = "Select a.*, b.already_voted from student_list a left join voter_election b on a.student_id = b.username
          where a.student_Id = {$_SESSION['username']} and b.election_id = {$GLOBALS['voter_electionId']}";
  $res = mysql_query($sel);
  while($row = mysql_fetch_array($res))
  {
    $GLOBALS['student_id'] = $row['student_id']!=''?$row['student_id']:'';
    $GLOBALS['fname'] = $row['student_fname']!=''?$row['student_fname']:'';
    $GLOBALS['lname'] = $row['student_lname']!=''?$row['student_lname']:'';
    $GLOBALS['mi'] = $row['student_mi']!=''?$row['student_mi']:'';
    $GLOBALS['course'] = $row['student_course']!=''?$row['student_course']:'';
    $GLOBALS['email'] = $row['student_email']!=''?$row['student_email']:'';
    $GLOBALS['already_voted'] = $row['already_voted']!=''?$row['already_voted']:'';
  }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cast Your Vote | Election Title</title>

    <!-- Bootstrap core CSS -->
    <link href="css/voting-ronnelsanchez.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--link rel="stylesheet" href="css/font-awesome.min.css"-->
    <link href="css/styles.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <body>

      <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-logo"><img class="brand-logo" width="125" src="images/school-logo.png"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul id="right-nav" class="nav navbar-nav navbar-right">

                <li>
                  <div class="user-nav dropdown">
                    <a data-toggle="dropdown" href="#">
                      <div class="media">
                        <div class="media-left media-middle">
                          <img width="40" class="img-circle" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" alt=".img-circle">
                          <i class="fa fa-fw  hidden-xs" aria-hidden="true" title="Copy to use caret-down"></i>
                        </div>
                      <div class="media-body media-middle hidden-sm hidden-md hidden-lg">
                          <div class="user-company">
                          <strong><?php echo $_SESSION['fname'].' '.$_SESSION['mi'].' '.$_SESSION['lname']; ?>
                             <i class="fa fa-fw pull-right" aria-hidden="true"></i>
                          </strong>
                        </div><div class="user-email"><?php echo $_SESSION['email']; ?></div>
                      </div>
                    </div>
                    </a>
                        <ul class="dropdown-menu">
                        <li>
                         <div class="user-media media hidden-xs">
                              <div class="media-left media-middle">
                                <img width="60" class="img-circle" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" alt=".img-circle">
                              </div>
                            <div class="media-body media-middle">
                                <div class="user-company">
                                <strong><?php echo $_SESSION['fname'].' '.$_SESSION['mi'].' '.$_SESSION['lname']; ?></strong>
                              </div><div class="user-email"><?php echo $_SESSION['email']; ?></div>
                            </div>
                          </div>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="logout.php">Log Out</a></li>
                      </ul>
                  </div>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
      </div>
    </nav>
    <div class="bg-banner">
    </div>
    <div class="welcome-banner welcome-normal section-container container">
          <div class="row">
            <div class="col-xs-12 text-center">
                <?php
                    $query_electDetails = "Select * from election where election_id=".$GLOBALS['voter_electionId'].";";
                    $result_elect = mysql_query($query_electDetails);
                    if($result_elect == FALSE)
                        die(mysql_error());

                    $ctr = 1;
                    while($row = mysql_fetch_array($result_elect)){
                        echo '<h1 class="h1-normal">'.$row['election_name'].'</h1>';
                    }
                ?>
                  
                  <p class="p-normal">
                  Cast Your Vote
                  </p>
            </div>
          </div>
    </div>
    <main id="candidatesContainer">
      <div class="section-container container">
        <div class="row">
          <div class="col-xs-12">
              <div class="main-content">
  
                <div class="row form-group">
                      <div class="col-xs-12">
                          <ul class="nav nav-pills nav-justified setup-panel">
                            <li class="active" id='stepp1'><a href="#step-1">
                            <h6 class="list-group-item-heading">President</h6>
                            </a></li>
                            <li class="disabled"><a href="#step-2">
                            <h6 class="list-group-item-heading">Vice-President</h6>
                            </a></li>
                            <li class="disabled"><a href="#step-3">
                            <h6 class="list-group-item-heading">Secretary</h6>
                            </a></li>
                            <li class="disabled"><a href="#step-4">
                            <h6 class="list-group-item-heading">Treasurer</h6>
                            </a></li>
                            <li class="disabled fourth"><a href="#step-5">
                            <h6 class="list-group-item-heading">4th Year Representative</h6>
                            </a></li>
                            <li class="disabled third"><a href="#step-5">
                            <h6 class="list-group-item-heading">3rd Year Representative</h6>
                            </a></li>
                            <li class="disabled second"><a href="#step-5">
                            <h6 class="list-group-item-heading">2nd Year Representative</h6>
                            </a></li>
                            <li class="disabled first"><a href="#step-5">
                            <h6 class="list-group-item-heading">1st Year Representative</h6>
                            </a></li>
                            <li class="disabled" id="stepp6"><a href="#step-6">
                            <h6 class="list-group-item-heading">Completed</h6>
                            </a></li>
                          </ul>
                      </div>
                </div>
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">President</h1>
                            <div class="row voteradio">
                            <?php
                                $query1 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 1 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result1 = mysql_query($query1);
                                if($result1 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result1)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="presradio" id="radio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="radio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-2" class="btn btn-primary btn-xl pull-right">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">Vice-President</h1>
                            <div class="row voteradio">
                            <?php
                                $query2 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 2 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result2 = mysql_query($query2);
                                if($result2 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result2)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="vpresradio" id="vradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="vradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-3" class="btn btn-primary btn-xl pull-right">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">Secretary</h1>
                            <div class="row voteradio">
                            <?php
                                $query3 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 3 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result3 = mysql_query($query3);
                                if($result3 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result3)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="secradio" id="sradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="sradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-4" class="btn btn-primary btn-xl pull-right">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-4">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">Treasurer</h1>
                            <div class="row voteradio">
                            <?php
                                $query4 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 4 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result4 = mysql_query($query4);
                                if($result4 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result4)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="treasradio" id="tradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="tradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-5" class="btn btn-primary btn-xl pull-right">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content fourth" id="step-5">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">4th Year Representative</h1>
                            <div class="row voteradio">
                            <?php
                                $query5 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 8 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result5 = mysql_query($query5);
                                if($result5 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result5)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="fourthradio" id="fourthradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="fourthradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-6" class="btn btn-primary btn-xl pull-right activate-step-6">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content third" id="step-5" >
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">3rd Year Representative</h1>
                            <div class="row voteradio">
                            <?php
                                $query6 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 7 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result6 = mysql_query($query6);
                                if($result6 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result6)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="thirdradio" id="thirdradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="thirdradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-6" class="btn btn-primary btn-xl pull-right activate-step-6">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content second" id="step-5">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">2nd Year Representative</h1>
                            <div class="row voteradio">
                            <?php
                                $query7 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 6 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result7 = mysql_query($query7);
                                if($result7 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result7)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="secondradio" id="secondradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="secondradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-6" class="btn btn-primary btn-xl pull-right activate-step-6">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content first" id="step-5">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">1st Year Representative</h1>
                            <div class="row voteradio">
                            <?php
                                $query8 = "Select a.*,b.election_id from candidate a left join party b on a.candidate_party_id=b.party_id where a.candidate_position_id = 5 and b.election_id=".$GLOBALS['voter_electionId'].";";
                                $result8 = mysql_query($query8);
                                if($result8 == FALSE)
                                    die(mysql_error());

                                $ctr = 1;
                                while($row = mysql_fetch_array($result8)){
                                    echo'
                                    <div class="col-sm-12 col-md-4 text-center">
                                    <div class="candidate-avatar">
                                    <img width="200" height="200" class="img-thubnail" src="data:image/jpeg;base64,'.base64_encode( $row['candidate_picture'] ).'" alt=".img-circle"/>
                                    </div>
                                    <div>
                                    <div class="separator"></div>
                                    <div class="candidate-detailes">
                                    <h4>'.$row['candidate_name'].'</h4>
                                    <h4>'.$row['candidate_course'].'</h4>
                                    <h4>'.$row['candidate_year'].'</h4>
                                    </div>
                                    <div class="voteradio-success col-md-6 col-md-offset-3">
                                        <input type="radio" name="firstradio" id="firstradio'.$ctr.'" value="'.$row['candidate_id'].'" />
                                        <label for="firstradio'.$ctr.'"><b>Vote</b></label>
                                    </div>
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                          <div class="row"><button id="activate-step-6" class="btn btn-primary btn-xl pull-right activate-step-6">Next</button></div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-6">
                    <div class="col-xs-12">
                        <div class="col-xs-12 text-center">
                            <div class="row">
                                <div class="alert alert-success">
                                    <h3><strong>Your vote has been cast</strong></h3>
                                    Thank you for voting your next School Councils<br />
                                    stay tune for the result at the end of voting period<br /><br />
                                    <a href="logout.php" type="button" class="btn btn-xl btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
          </div>
        </div>
      </div>
    </main>

   
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/scripts.js"></script>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      var voted = "<?php echo $GLOBALS['already_voted'] ?>";
      if(voted)
      { 
        $("#stepp6").removeClass("disabled");
        $("#stepp6").addClass("active");
        $("#stepp1").removeClass("active");
        $("#stepp1").addClass("disabled");
        $('ul.setup-panel li a[href="#step-6"]').trigger('click');
      }
      
      //check the year of voter
      var course = "<?php echo $GLOBALS['course']; ?>";
      var year = course.slice(-1); 
      if (!isNaN(parseInt(year, 10)) && (year=='4'||year=='3'||year=='2'||year=='1' ) ) {
        // course is a number
        if(year == "4")
        {
          $(".third").remove();
          $(".second").remove();
          $(".first").remove();
        }
        else if(year == "3")
        {
          $(".fourth").remove();
          $(".second").remove();
          $(".first").remove();
        }
        else if(year == "2")
        {
          $(".fourth").remove();
          $(".third").remove();
          $(".first").remove();
        }
        else if(year == "1")
        {
          $(".fourth").remove();
          $(".third").remove();
          $(".second").remove();
        }
      }
      else
      {
        alert("Your account was not setup properly. Please contact your administrator");
      }

      //check if atleast one candidate is selected
      if(!($('input[name="presradio"]:checked').length > 0))
        $("#activate-step-2").prop("disabled",true);
      if(!($('input[name="vpresradio"]:checked').length > 0))
        $("#activate-step-3").prop("disabled",true);
      if(!($('input[name="secradio"]:checked').length > 0))
        $("#activate-step-4").prop("disabled",true);
      if(!($('input[name="treasradio"]:checked').length > 0))
        $("#activate-step-5").prop("disabled",true);
      if(!($('input[name="firstradio"]:checked').length > 0))
        $("#activate-step-6").prop("disabled",true);
      if(!($('input[name="secondradio"]:checked').length > 0))
        $("#activate-step-6").prop("disabled",true);
      if(!($('input[name="thirdradio"]:checked').length > 0))
        $("#activate-step-6").prop("disabled",true);
      if(!($('input[name="fourthradio"]:checked').length > 0))
        $("#activate-step-6").prop("disabled",true);

      var pres = "";
      var vpres = "";
      var sec = "";
      var treas = "";
      var first = "";
      var second = "";
      var third = "";
      var fourth = "";
      $('input[name="presradio"]').click(function(){
        pres = $(this).val();
        $("#activate-step-2").prop("disabled",false);
      });
      $('input[name="vpresradio"]').click(function(){
        vpres = $(this).val();
        $("#activate-step-3").prop("disabled",false);
      });
      $('input[name="secradio"]').click(function(){
        sec = $(this).val();
        $("#activate-step-4").prop("disabled",false);
      });
      $('input[name="treasradio"]').click(function(){
        treas = $(this).val();
        $("#activate-step-5").prop("disabled",false);
      });
      $('input[name="firstradio"]').click(function(){
        first = $(this).val();
        $("#activate-step-6").prop("disabled",false);
      });
      $('input[name="secondradio"]').click(function(){
        second = $(this).val();
        $("#activate-step-6").prop("disabled",false);
      });
      $('input[name="thirdradio"]').click(function(){
        third = $(this).val();
        $("#activate-step-6").prop("disabled",false);
      });
      $('input[name="fourthradio"]').click(function(){
        fourth = $(this).val();
        $("#activate-step-6").prop("disabled",false);
      });

      $("#activate-step-6").click(function(){
        //record vote!
        $.ajax({
          type : 'post',
          url : 'count_vote.php', //Here you will fetch records 
          data :  {electionid: <?php echo $GLOBALS['voter_electionId']?>, pres: pres, vpres: vpres, sec: sec, treas: treas, first: first, second: second, third:third, fourth: fourth}, //Pass $id
          success : function(data){
            console.log(data);
            //$('#editStudent').html(data);//Show fetched data from database
          }
        });
      });


    });

    $(function () {
      $('#viewModal').modal({
        keyboard: true,
        backdrop: "static",
        show: false,
      }).on('show', function () {});
      $("#table-member").find('tr[data-id]').on('click', function () {
        //let modalDetails = '<span class="label-title">Project Manager</span>';
        //do all your operation populate the modal and open the modal now. DOnt need to use show event of modal again
        //$('#modalDetails').html($(modalDetails));
        $('#viewModal').modal('show');
      });
    });
    </script>

    <script>
    $.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
        pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#sTable').pageMe({pagerSelector:'#cPager',showPrevNext:true,hidePageNumbers:false,perPage:4});
  $('#sTable').pageMe({pagerSelector:'#sPager',showPrevNext:true,hidePageNumbers:false,perPage:4});

});
</script>
  </body>
</html>
