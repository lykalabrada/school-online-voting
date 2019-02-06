<?php 
////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

session_start(); 
if($_SESSION['comsel_electionId'] == '')
      header("Location: login.php");
require_once ('dbconnect.php');

$GLOBALS['electionId'] = $_SESSION['comsel_electionId'];
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

    <title>COMSEL | Election Title</title>

    <!-- Bootstrap core CSS -->
    <link href="css/voting-ronnelsanchez.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <!--link rel="stylesheet" href="css/font-awesome.min.css"-->
    <link rel="stylesheet" href="css/datepicker/datepicker.css">
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <body>
    <header id="global-nav" class="navbar navbar-default">
        <nav role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             <img class="brand-logo" width="125" src="images/school-logo.png">
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
    </header>
    <div id="banner" class="navbar navbar-secondary">
    <nav role="navigation">
      <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="heading">
                  <?php
                  $query = "SELECT * FROM election where election_id=".$GLOBALS['electionId'];
                  $result = mysql_query($query);

                  while($row = mysql_fetch_array($result)){  
                      echo '<h1>'.$row['election_name'].'</h1>';
                    }
                  ?>
                </div>
            </div>
          </div>
          <ul id="sub-nav" class="nav nav-tabs-secondary hidden-xs">
            <li class="active">
              <a data-toggle="tab" href="#cTab">Candidates</a>
            </li>
            <li>
              <a data-toggle="tab" href="#eTab">Election Details</a>
            </li>
            <li>
              <a data-toggle="tab" href="#rTab">Result</a>
            </li>
            <?php
              $query1 = "SELECT * FROM student_list where student_id='{$_SESSION['username']}'";
              $result1 = mysql_query($query1);

              while($row = mysql_fetch_array($result1)){  
                  echo '<li><a href="./vote-page.php" target="_blank">Vote Now</a></li>';
                }
            ?>
          </ul>
       </div>
         <div id="res-sub-nav" class="container-fluid hidden-sm hidden-md hidden-lg text-center">
            <a data-toggle="collapse" href="#collapseSubNav" class="collapsed" aria-expanded="false">
              <span>Menu<i class="fa fa-fw pull-right" aria-hidden="true"></i></span>
            </a>
              <div class="collapse" id="collapseSubNav" aria-expanded="false" style="height: 0px;">
                <ul class="nav navbar-nav">
                  <li class="active">
                      <a data-toggle="tab" href="#cTab">Candidates</a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#eTab">Election Details</a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#rTab">Result</a>
                    </li>
                 </ul>
                 <!--button class="btn btn-outline-default btn-lg btn-block res-btn-change-status"><i class="fa fa-pause" aria-hidden="true"></i>Change Project Status</button-->
              </div>
          </div>
    </nav>
     
  </div>



    <main>
      <div class="container tab-content">
        <div id="cTab" class="row tab-pane fade in active">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-xl btn-float pull-right"  data-toggle="modal" data-target="#newParty">New Partylist/Candidates</button>
          </div>
          <div class="col-xs-12">
            <div class="section-title in-progress">
              <h2 class="h3">Partylist</h2>
              <div class="in-progress-bar"></div>
            </div>
          </div>


          <?php
            $query = "SELECT distinct * FROM party where election_id=".$GLOBALS['electionId']." ORDER by is_independent";
            $result = mysql_query($query); //echo $query;
            if($result === FALSE)
              die(mysql_error());

            while($row = mysql_fetch_array($result)){  
              echo '
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                  <div class="thumbnail">
                    <div class="caption">                 
                      <button class="btn btn-default">Delete</button>&nbsp;&nbsp;  &nbsp;    
                      <button class="btn btn-primary pull-right"  data-toggle="modal" id="editPartyBtn" data-target="#editPartymodal" data-id="'.$row['party_id'].'">Edit</button>
                      <div class="heading">
                       <span class="label-title">Partylist</span>
                        <h3>'.$row["party_name"].'</h3>
                      </div>
                    </div>
                    <div class="separator"></div>
                    <div class="thumbnail-section">';

                    $queryCand = "SELECT * FROM candidate a left join party b on a.candidate_party_id = b.party_id left join position c on a.candidate_position_id=c.id 
                                          where a.candidate_party_id={$row['party_id']}
                                          order by a.candidate_position_id";
                    $candresult = mysql_query($queryCand); //echo $queryCand;
                    if($candresult === FALSE)
                      die(mysql_error());
                    
                    while($cand_row = mysql_fetch_array($candresult)){  
                        echo '
                          <span class="label-title">'.$cand_row['position'].'</span>
                          <p>'.$cand_row['candidate_name'].'</p>
                      ' ;
                        }
                echo '
                  </div>
                 </div>
              </div>';
            }
        ?>
        </div>
        <div id="eTab" class="row tab-pane fade">
          <div class="col-xs-12">
              <div class="main-content">
              <div class="row section">
                  <div class="col-xs-12">
                    <h3 class="section-title pull-left">Election Details</h3>
                  </div>
                </div>
               <div class="row section">
                <?php
                  $query = "SELECT * FROM election where election_id=".$GLOBALS['electionId'];
                  $result = mysql_query($query);

                  while($row = mysql_fetch_array($result)){  
                      $startdate=date_create($row['start_date']);
                      $enddate=date_create($row['end_date']);
                      echo '
                <div class="col-xs-12">
                    <form class="form-horizontal" id="formElectionDetails">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Election Title</label>
                        <b><input style="background-color:#fafbfb;" type="email" class="form-control input-lg" id="inputEmail3" value="'.$row['election_name'].'" placeholder="Election Title"></b>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Voting Day</label>
                       <div class="input-daterange input-group" id="dateOnAdminElection">
                          <b><input style="background-color:#fafbfb;" type="text" class="form-control input-lg" value="'.date_format($startdate,"m/d/Y").'"  placeholder="Star Date" name="start" /></b>
                          <span class="input-group-addon">to</span>
                          <b><input style="background-color:#fafbfb;" type="text" class="form-control input-lg" value="'.date_format($enddate,"m/d/Y").'" placeholder="End Date" name="end" /></b>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Description</label>
                        <b><textarea style="background-color:#fafbfb;" class="form-control" rows="3">'.$row['election_desc'].'</textarea></b>
                      </div>
                    </div>
                  </form>
                </div>
                ';
              }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div id="rTab" class="row tab-pane fade">
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
                                        FROM vote_count v WHERE v.position_id = 1 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 1 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 2 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 2 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 3 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 3 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 4 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 4 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 8 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 8 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 7 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 7 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 6 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 6 and a.election_id={$GLOBALS['electionId']}
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
                                        FROM vote_count v WHERE v.position_id = 5 and v.election_id={$GLOBALS['electionId']}
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
                                        WHERE a.position_id = 5 and a.election_id={$GLOBALS['electionId']}
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

    <footer>
      <div class="container">
        Footer
      </div>
    </footer>
   

      <!-- New Partylist -->
    <div class="modal fade modal-fullscreen modal-responsive " id="newParty" tabindex="-1" role="dialog" aria-labelledby="newParty">
      <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title">New Partylist</h3>
          </div>
          <div class="modal-body">
                <form class="form-horizontal" id="newPartyForm" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <h3 class="text-success"><b>Partylist</b></h3>
                       <label class="radio-inline"><input type="radio" id="" name="rdo_isDependent" value="0">New Partylist</label>
                       <label class="radio-inline"><input type="radio" id="" name="rdo_isDependent" value="1">Independent</label>
                      </div>
                    </div>
                    <div class="form-group">
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Partylist Logo</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="partylogo" id="partylogo" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">Partylist Name</label>
                        <input type="" class="form-control" id="party_name" name="party_name" placeholder="Partylist Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="party_mission" name="party_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>President</b></h3>
                      </div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">President Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="pres_pic" id="pres_pic" data-icon="false"/>

                      <!-- try cute upload from here - ->
                      <div class="browse_text">Browse Image File:</div>
                      <div class="file_input_container">
                        <div class="upload_button"><input type="file" name="photo" id="photo" class="file_input" /></div>
                      </div>
                      <!- - try cute upload up to here -->


                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">President Name</label>
                        <input type="" class="form-control" id="pres_name" name="pres_name" placeholder="President Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="pres_age" name="pres_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="pres_course" name="pres_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="pres_year" name="pres_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="pres_mission" name="pres_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>Vice-President</b></h3>
                      </div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Vice-President Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="vpres_pic" id="vpres_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">Vice-President Name</label>
                        <input type="" class="form-control" id="vpres_name" name="vpres_name" placeholder="Vice-President Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="vpres_age" name="vpres_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="vpres_course" name="vpres_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="vpres_year" name="vpres_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="vpres_mission" name="vpres_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>Secretary</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Secretary Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="sec_pic" id="sec_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">Secretary Name</label>
                        <input type="" class="form-control" id="sec_name" name="sec_name" placeholder="Secretary Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="sec_age" name="sec_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="sec_course" name="sec_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="sec_year" name="sec_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="sec_mission" name="sec_mission" rows="3"></textarea>
                      </div>
                    </div>
                     <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>Treasurer</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Treasurer Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="treas_pic" id="treas_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">Treasurer Name</label>
                        <input type="" class="form-control" id="treas_name" name="treas_name" placeholder="Treasurer Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="treas_age" name="treas_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="treas_course" name="treas_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="treas_year" name="treas_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="treas_mission" name="treas_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>4th Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">4th Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="fourthRep_pic" id="fourthRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">4th Year Name</label>
                        <input type="" class="form-control" id="fourthRep_name" name="fourthRep_name" placeholder="4th Year Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="fourthRep_age" name="fourthRep_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="fourthRep_course" name="fourthRep_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="fourthRep_year" name="fourthRep_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="fourthRep_mission" id="fourthRep_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>3rd Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">3rd Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="thirdRep_pic" id="thirdRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">3rd Year Name</label>
                        <input type="" class="form-control" id="thirdRep_name" name="thirdRep_name" placeholder="3rd Year Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="thirdRep_age" name="thirdRep_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="thirdRep_course" name="thirdRep_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="thirdRep_year" name="thirdRep_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="thirdRep_mission" id="thirdRep_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>2nd Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">2nd Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="secondRep_pic" id="secondRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">2nd Year Name</label>
                        <input type="" class="form-control" id="secondRep_name" name="secondRep_name" placeholder="2nd Year Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="secondRep_age" name="secondRep_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="secondRep_course" name="secondRep_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="secondRep_year" name="secondRep_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="secondRep_mission" id="secondRep_mission" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>1st Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">1st Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <input type="file" class="filestyle" name="firstRep_pic" id="firstRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">1st Year Name</label>
                        <input type="" class="form-control" id="firstRep_name" name="firstRep_name" placeholder="1st Year Name">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="firstRep_age" name="firstRep_age" placeholder="Age">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="firstRep_course" name="firstRep_course" placeholder="Course">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="firstRep_year" name="firstRep_year" placeholder="Year">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="firstRep_mission" id="firstRep_mission" rows="3"></textarea>
                      </div>
                    </div>
                  </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="addPartyBtn" name="addPartyBtn">Submit</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Edit Partylist -->
    <div class="modal fade modal-fullscreen modal-responsive " id="editPartymodal" tabindex="-1" role="dialog" aria-labelledby="editPartymodal">
              <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      <div class="modal-dialog" role="document">
        <div class="modal-content" id="editParty">

          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <script src="js/bootstrap-dialog.min.js"></script>
    <script>
    $(function () {

      $("#formElectionDetails :input").prop("disabled", true);

      $("#addPartyBtn").click(function(){
        if( !validateText("partylogo") || !validateText("party_name") || !validateText("party_mission"))
        {
          return false;
        }
        else
        {
          $("#newPartyForm").ajaxSubmit({
            type: "POST",
              url: "addParty.php",
              data: $('#newPartyForm').serialize(),
              cache: false,
              success: function (response) {
                console.log(response);
                location.reload();
              }
          });
        }
        
      });

      //edit Partylist
      $('#editPartymodal').on('show.bs.modal', function (e) {//alert(fetchURL);
          var partyid = $(e.relatedTarget).data('id');
          $.ajax({
              type : 'post',
              url : 'edit_partylist.php', //Here you will fetch records 
              data :  'partyid='+ partyid, //Pass $id
              success : function(data){
              $('#editParty').html(data);//Show fetched data from database
              }
          });
       });


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
