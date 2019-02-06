<?php

  ////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
  error_reporting(0);
  @ini_set(‘display_errors’, 0);

  require_once ('dbconnect.php');
  session_start();
  if($_SESSION['voter_electionId'] == '')
    header("Location: login.php");
  $GLOBALS['voter_electionId'] = $_SESSION['voter_electionId'];
  
  $sel = "Select * from student_list where student_Id = {$_SESSION['username']};";
  $res = mysql_query($sel);
  while($row = mysql_fetch_array($res))
  {
    $GLOBALS['student_id'] = $row['student_id']!=''?$row['student_id']:'';
    $GLOBALS['fname'] = $row['student_fname']!=''?$row['student_fname']:'';
    $GLOBALS['lname'] = $row['student_lname']!=''?$row['student_lname']:'';
    $GLOBALS['mi'] = $row['student_mi']!=''?$row['student_mi']:'';
    $GLOBALS['course'] = $row['student_course']!=''?$row['student_course']:'';
    $GLOBALS['email'] = $row['student_email']!=''?$row['student_email']:'';
  }

  $sel_election = "Select * from election where election_id = {$GLOBALS['voter_electionId']};";
  $res2 = mysql_query($sel_election);
  while($row = mysql_fetch_array($res2))
  {
    $GLOBALS['election_name'] = $row['election_name'];
    
    $s_date = new DateTime($row['start_date']);
    $e_date = new DateTime($row['end_date']);

    $GLOBALS['start_date'] = $s_date;
    $GLOBALS['end_date'] = $e_date;
    
    if(date('m/d/Y') >= date_format($s_date,"m/d/Y") && date('m/d/Y') <= date_format($e_date,"m/d/Y")) {
      $GLOBALS['election_status'] = "open";
    }
    else if( date('m/d/Y') > date_format($e_date,"m/d/Y")) {
      $GLOBALS['election_status'] = "close";
    }
    else if( date('m/d/Y') < date_format($s_date,"m/d/Y")) {
      $GLOBALS['election_status'] = "soon";
    }
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

    <title>Welcome | Election Title</title>

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
    <div class="welcome-banner section-container container">
          <div class="row">
            <div class="col-xs-12 text-center">
                  <h1><?php echo $GLOBALS['election_name'] ?></h1>
                  <?php
                    if($GLOBALS['election_status']=='open'){
                      echo '
                        <p>
                          Voting is now open. ('.date_format($GLOBALS['start_date'],'F d Y').' till '.date_format($GLOBALS['end_date'],'F d Y').') <br /> <br />      
                          <a href="./vote-page.php" class="btn btn-xl btn-primary"> Cast Your Vote Now</a>
                        </p>
                      ';
                    }
                    else if($GLOBALS['election_status']=='close'){
                      echo '
                        <p>
                          Election has ended. ('.date_format($GLOBALS['start_date'],'F d Y').' till '.date_format($GLOBALS['end_date'],'F d Y').') <br /> <br />      
                          <a id="btn-viewResults" onclick="javascript:viewResults();" class="btn btn-xl btn-primary">View Results</a>
                        </p>
                      ';
                    }
                    else if($GLOBALS['election_status']=='soon'){
                      echo '
                        <p>
                          Voting is not yet open. ('.date_format($GLOBALS['start_date'],'F d Y').' till '.date_format($GLOBALS['end_date'],'F d Y').') <br /> <br />      
                          <a id="btn-viewCandidates" onclick="javascript:viewCandidates();" class="btn btn-xl btn-primary">View Candidates</a>
                        </p>
                      ';
                    }
                  ?>
            </div>
          </div>
    </div>
    <main id="candidatesContainer" style="display:none;">
    <!--Wizard Candidates-->
      <div id="wizardContainer" class="section-container container">
        <div class="row">
          <div class="col-xs-12">
              <div class="main-content">
  
                <div class="row form-group">
                      <div class="col-xs-12">
                          <ul class="nav nav-pills nav-justified setup-panel">
                            <li class="active"><a href="#step-1">
                            <h6 class="list-group-item-heading">President</h6>
                            </a></li>
                            <li class=""><a href="#step-2">
                            <h6 class="list-group-item-heading">Vice-President</h6>
                            </a></li>
                            <li class=""><a href="#step-3">
                            <h6 class="list-group-item-heading">Secretary</h6>
                            </a></li>
                            <li class=""><a href="#step-4">
                            <h6 class="list-group-item-heading">Treasurer</h6>
                            </a></li>
                            <li class=""><a href="#step-5">
                            <h6 class="list-group-item-heading">4th Year Representative</h6>
                            </a></li>
                            <li class=""><a href="#step-6">
                            <h6 class="list-group-item-heading">3rd Year Representative</h6>
                            </a></li>
                            <li class=""><a href="#step-7">
                            <h6 class="list-group-item-heading">2nd Year Representative</h6>
                            </a></li>
                            <li class=""><a href="#step-8">
                            <h6 class="list-group-item-heading">1st Year Representative</h6>
                            </a></li>
                          </ul>
                      </div>
                </div>
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">President</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">Vice-President</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">Secretary</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-4">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">Treasurer</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-5">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">4th Year Representative</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-6">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">3rd Year Representative</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>                            
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-7">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">2nd Year Representative</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-8">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h1 class="">1st Year Representative</h1>
                            <div class="row">
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
                                    </div>
                                  </div>
                                  ';
                                  $ctr++;
                                }
                            ?>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-9">
                    <div class="col-xs-12">
                        <div class="col-xs-12 text-center">
                            <div class="row">
                                <div class="alert alert-success">
                                    <h3><strong>Your vote has been cast</strong></h3>
                                    Thank you for voting your next School Councils<br />
                                    stay tune for the result at the end of voting period<br /><br />
                                    <a href="./welcome-vote.html" type="button" class="btn btn-xl btn-primary">Logout</a>
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
    <main id="resultsContainer" style="display:none;">
    <!--results Candidates-->
      <div id="wizardContainer" class="section-container container">
        <div class="row">
          <div class="col-xs-12">
              <div class="main-content">
              <div class="row section">
                  <div class="col-xs-12">
                    <h3 class="section-title pull-left">Election Result</h3>
                    <button class="btn btn-xl btn-primary pull-right" onclick="window.print()" id="printResult">Print</button>
                  </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <h4>President</h4>
                  <?php
                    $total_vote_pres = 0;
                    $count_total_pres = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 1 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_pres = mysql_query($count_total_pres);
                    if($tot_pres === FALSE)
                      die(mysql_error());
                    else{
                      $tot_pres = mysql_fetch_row($tot_pres);
                      $total_vote_pres = $tot_pres[1];
                    }
                    
                    $count_vote_pres = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as pres_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 1 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_pres = mysql_query($count_vote_pres);
                    while($row = mysql_fetch_array($total_pres))
                    { 
                      $percent = ($row['pres_total']/$total_vote_pres)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>Vice-President</h4>
                  <?php
                    $total_vote_vpres = 0;
                    $count_total_vpres = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 2 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_vpres = mysql_query($count_total_vpres);
                    if($tot_vpres === FALSE)
                      die(mysql_error());
                    else{
                      $tot_vpres = mysql_fetch_row($tot_vpres);
                      $total_vote_vpres = $tot_vpres[1];
                    }
                    
                    $count_vote_vpres = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as vpres_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 2 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_vpres = mysql_query($count_vote_vpres);
                    while($row = mysql_fetch_array($total_vpres))
                    { 
                      $percent = ($row['vpres_total']/$total_vote_vpres)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>Secretary</h4>
                  <?php
                    $total_vote_sec = 0;
                    $count_total_sec = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 3 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_sec = mysql_query($count_total_sec);
                    if($tot_sec === FALSE)
                      die(mysql_error());
                    else{
                      $tot_sec = mysql_fetch_row($tot_sec);
                      $total_vote_sec = $tot_sec[1];
                    }
                    
                    $count_vote_sec = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as sec_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 3 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_sec = mysql_query($count_vote_sec);
                    while($row = mysql_fetch_array($total_sec))
                    { 
                      $percent = ($row['sec_total']/$total_vote_sec)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>Treasurer</h4>
                  <?php
                    $total_vote_treas = 0;
                    $count_total_treas = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 4 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_treas = mysql_query($count_total_treas);
                    if($tot_treas === FALSE)
                      die(mysql_error());
                    else{
                      $tot_treas = mysql_fetch_row($tot_treas);
                      $total_vote_treas = $tot_treas[1];
                    }
                    
                    $count_vote_treas = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as treas_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 4 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_treas = mysql_query($count_vote_treas);
                    while($row = mysql_fetch_array($total_treas))
                    {
                      $percent = ($row['treas_total']/$total_vote_treas)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>4th Year Representative</h4>
                  <?php
                    $total_vote_fourth = 0;
                    $count_total_fourth = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 8 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_fourth = mysql_query($count_total_fourth);
                   if($tot_fourth === FALSE)
                      die(mysql_error());
                    else{
                      $tot_fourth = mysql_fetch_row($tot_fourth);
                      $total_vote_fourth = $tot_fourth[1];
                    }
                    
                    $count_vote_fourth = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as fourth_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 8 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_fourth = mysql_query($count_vote_fourth);
                    while($row = mysql_fetch_array($total_fourth))
                    {
                      $percent = ($row['fourth_total']/$total_vote_fourth)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>3rd Year Representative</h4>
                  <?php
                    $total_vote_third = 0;
                    $count_total_third = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 7 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_third = mysql_query($count_total_third);
                   if($tot_third === FALSE)
                      die(mysql_error());
                    else{
                      $tot_third = mysql_fetch_row($tot_third);
                      $total_vote_third = $tot_third[1];
                    }
                    
                    $count_vote_third = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as third_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 7 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_third = mysql_query($count_vote_third);
                    while($row = mysql_fetch_array($total_third))
                    {
                      $percent = ($row['third_total']/$total_vote_third)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>2nd Year Representative</h4>
                  <?php
                    $total_vote_second = 0;
                    $count_total_second = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 6 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_second = mysql_query($count_total_second);
                   if($tot_second === FALSE)
                      die(mysql_error());
                    else{
                      $tot_second = mysql_fetch_row($tot_second);
                      $total_vote_second = $tot_second[1];
                    }
                    
                    $count_vote_second = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as second_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 6 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_second = mysql_query($count_vote_second);
                    while($row = mysql_fetch_array($total_second))
                    {
                      $percent = ($row['second_total']/$total_vote_second)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12">
                  <h4>1st Year Representative</h4>
                  <?php
                    $total_vote_first = 0;
                    $count_total_first = "SELECT v.position_id, COUNT(*) as total_vote 
                                        FROM vote_count v WHERE v.position_id = 5 and v.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY v.position_id";
                    $tot_first = mysql_query($count_total_first);
                   if($tot_first === FALSE)
                      die(mysql_error());
                    else{
                      $tot_first = mysql_fetch_row($tot_first);
                      $total_vote_first = $tot_first[1];
                    }
                    
                    $count_vote_first = "SELECT a.candidate_id, b.candidate_picture, b.candidate_name, c.party_name, b.candidate_position_id
                                              , COUNT(*) as first_total
                                        FROM vote_count a JOIN candidate b ON a.candidate_id = b.candidate_id
                                            JOIN party c ON b.candidate_party_id = c.party_id
                                        WHERE a.position_id = 5 and a.election_id={$GLOBALS['voter_electionId']}
                                        GROUP BY a.candidate_id";
                    $total_first = mysql_query($count_vote_first);
                    while($row = mysql_fetch_array($total_first))
                    {
                      $percent = ($row['first_total']/$total_vote_first)*100;
                      if(!empty($row['candidate_picture']))
                        $src = "data:image/jpeg;base64,".base64_encode($row['candidate_picture']);
                      else
                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+";
                      echo '
                        <div>
                          <div class="user-avatar">
                            <img width="40" class="img-circle" src="'.$src.'" alt=".img-circle">
                          </div>
                          <div>
                            <strong>'.strtoupper($row['candidate_name']).'</strong> - '.strtoupper($row['party_name']).'<span class="pull-right">'.number_format($percent,2).'%</span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.number_format($percent,2).'%">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  ?>
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
      //var 
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
