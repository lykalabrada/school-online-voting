<?php 
////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

session_start();
require_once ('dbconnect.php');
$GLOBALS['electionId'] = $_GET['elect'];
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

    <title>Admin | Election Title</title>

    <!-- Bootstrap core CSS -->
    <link href="css/voting-ronnelsanchez.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--link rel="stylesheet" href="css/font-awesome.min.css"-->
    <link rel="stylesheet" href="css/datepicker/datepicker.css">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    


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
                <a href="./admin.php" class="btn btn-link"><< view past election</a>
                <?php
                  $queryy = "SELECT * FROM election where election_id=".$GLOBALS['electionId'];
                  $resultt = mysql_query($queryy);

                  while($row = mysql_fetch_array($resultt)){  
                    echo "<h1>".$row['election_name']."</h1>";
                  }
                  ?>
                </div>
            </div>
          </div>
          <ul id="sub-nav" class="nav nav-tabs-secondary hidden-xs">
            <li class="active">
              <a data-toggle="tab" href="#uTab">Users</a>
            </li>
            <li>
              <a data-toggle="tab" href="#eTab">Election Details</a>
            </li>
            <li>
              <a data-toggle="tab" href="#rTab">Result</a>
            </li>
          </ul>
       </div>
         <div id="res-sub-nav" class="container-fluid hidden-sm hidden-md hidden-lg text-center">
            <a data-toggle="collapse" href="#collapseSubNav" class="collapsed" aria-expanded="false">
              <span>Menu<i class="fa fa-fw pull-right" aria-hidden="true"></i></span>
            </a>
              <div class="collapse" id="collapseSubNav" aria-expanded="false" style="height: 0px;">
                <ul class="nav navbar-nav">
                  <li class="active">
                      <a data-toggle="tab" href="#uTab">User</a>
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
        <div id="uTab" class="row tab-pane fade in active">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-xl btn-float pull-right"  data-toggle="modal" data-target="#uploadStudent">Upload Student</button>
          </div>
          <div class="col-xs-12">
            <button class='btn btn-primary btn-xl pull-right'  data-toggle='modal' id='' data-target='#newFaculty'>Add Faculty</button>
          </div>
          <div class="col-xs-12">
            <div class="section-title in-progress">
              <h2 class="h3">COMSEL   <!--<button class="btn btn-default btn-sm" >Email Access</button>--></h2>
              <div class="in-progress-bar"></div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="main-content">
              <div class="row section">
                <div id="table-member" class="table-responsive">
                  <table class="table table-hover  table-striped">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <!--<th>Course</th>-->
                        <th>Role</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Settings</th>
                      </tr>
                    </thead>
                    <tbody id="cTable">
                      <?php
                        $query = "SELECT * FROM voter_election aa right join users b on aa.username = b.username where (aa.role='comsel' or aa.role='faculty') and aa.election_id=".$GLOBALS['electionId']." ORDER BY b.user_fname";
                        $result = mysql_query($query);
                        if($result === FALSE)
                          die(mysql_error());

                        while($row = mysql_fetch_array($result)){  
                            echo "
                            <tr>
                              <td>".$row['username']."</td>
                              <td>".strtoupper($row['user_fname']).' '.strtoupper($row['user_mi']).' '.strtoupper($row['user_lname'])."</td>
                              <td>".strtoupper($row['role'])."</td>
                              <td>".$row['email']."</td>
                              <td>************</td>
                              <td><button class='btn btn-default btn-sm btn-block'  data-toggle='modal' id='editComselBtn' data-target='#editComselmodal' data-id='".$row['username']."'>Edit</button></td>
                            </tr>";
                        }
                      ?>
                    </tbody>
                  </table>   
                </div>
                <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="cPager"></ul>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xs-12">
            <div class="section-title in-progress">
              <h2 class="h3">STUDENT   <button class="btn btn-default btn-sm" data-toggle='modal' data-target='#confirmEmailBlastModal'>Email Access</button></h2>
              <div class="in-progress-bar"></div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="main-content">
              
                <div class='row section'>
                <div id='table-member' class='table-responsive'>
                  <table class='table table-hover  table-striped'>
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Settings</th>
                      </tr>
                    </thead>
                    <tbody id='sTable'>
                      <?php
                        $query = "SELECT distinct * FROM voter_election aa left join student_list a on a.student_id=aa.username left join users b on a.student_id = b.username where aa.election_id=".$GLOBALS['electionId']." and aa.role not in ('admin','faculty') ORDER BY b.user_fname";
                                 //"SELECT * FROM voter_election aa left join student_list a on a.student_id=aa.username right join users b on a.student_id = b.username where b.role='comsel' and aa.election_id=".$GLOBALS['electionId']." ORDER BY b.user_fname";
                        $result = mysql_query($query);
                        if($result === FALSE)
                          die(mysql_error());

                        while($row = mysql_fetch_array($result)){  
                          echo "
                        <tr>
                          <td>".$row['student_id']."</td>
                          <td>".strtoupper($row['student_fname']).' '.strtoupper($row['student_mi']).' '.strtoupper($row['student_lname'])."</td>
                          <td>".strtoupper($row['student_course'])."</td>
                          <td>".strtoupper($row['role'])."</td>
                          <td>".$row['student_email']."</td>
                          <td>************</td>
                          <td><button class='btn btn-default btn-sm btn-block' id='editStudentBtn' data-toggle='modal' data-target='#editStudentmodal' data-id='".$row['student_id']."'>Edit</button></td>
                        </tr>";
                        }
                      ?>
                    </tbody>
                  </table>   
                </div>
                <div class='col-md-12 text-center'>
                <ul class='pagination pagination-lg pager' id='sPager'></ul>
                </div>
              </div>
            
              
            </div>
          </div>
        </div>
        <div id="eTab" class="row tab-pane fade">
          <div class="col-xs-12">
              <div class="main-content">
              <div class="row section">
                  <div class="col-xs-12">
                    <h3 class="section-title pull-left">Election Details</h3>
                    <button type="button" id="updateElectionBtn" class="btn btn-xl btn-default pull-right">Update</button>
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
                    <form class="form-horizontal" id="formEditElection">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Election Title</label>
                        <input type="email" class="form-control input-lg" id="electionName" name="electionName" value="'.strtoupper($row['election_name']).'" placeholder="Election Title">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Voting Day</label>
                       <div class="input-daterange input-group" id="dateOnAdminElection">
                          <input type="text" id="startDate" name="startDate" class="form-control input-lg" value="'.date_format($startdate,"m/d/Y").'"  placeholder="Star Date" name="start" />
                          <span class="input-group-addon">to</span>
                          <input type="text" id="endDate" name="endDate" class="form-control input-lg" value="'.date_format($enddate,"m/d/Y").'" placeholder="End Date" name="end" />
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Description</label>
                        <textarea class="form-control" rows="3" id="electionDesc" name="electionDesc">'.$row['election_desc'].'</textarea>
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
   
    <!-- Invite to Project -->
    <div class="modal fade" id="inviteProject" tabindex="-1" role="dialog" aria-labelledby="inviteProject">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Invite to Project</h4>

          </div>
          <div class="modal-body text-center">
              <h3 class="section-title">Invite <strong>Translator Name</strong> to your project.</h3>
              <p>
              <button type="button" class="btn btn-primary btn-lg">Submit Invitation</button>
              <br />
              </p>
          </div>

        </div>
      </div>
    </div>

    <!-- View to Data -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Project Manager</h4>
          </div>
          <div id="modalDetails" class="modal-body">
              <div class="modal-section">
                <span class="label-title">
                  Project Manager
                </span>
                <h3>Edouard Balde</h3>
              </div>
              <div class="modal-section">
                <span class="label-title">
                Translator Member
                </span>
                <ul class="list list-unstyled">
                <li>Ronnel Sanchez</li>
                <li>Lyka Labrada</li>
                </ul>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- EDIT STUDENT -->
    <div class="modal fade" id="editStudentmodal" tabindex="-1" role="dialog" aria-labelledby="editStudentmodal">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="editStudent">        
        </div>
      </div>
    </div>
    <!-- EDIT COMSEL -->
    <div class="modal fade" id="editComselmodal" tabindex="-1" role="dialog" aria-labelledby="editComselmodal">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="editComsel">        
        </div>
      </div>
    </div>

     <!-- New FACULTY -->
    <div class="modal fade" id="newFaculty" tabindex="-1" role="dialog" aria-labelledby="newFaculty">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="editUser">        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Add Faculty (Comsel)</h4>
          </div>
          <div class="modal-body" >
            <form class="form-horizontal" method="post" action="" id="formAddFaculty">
              <div class="form-group">
                  <div class="col-sm-12">
                  <label for="" class="control-label label-title">#ID</label>
                    <input type="text" class="form-control" id="fac_username" name="fac_username" placeholder="ID">
                  </div>
                </div>
                 <div class="form-group">
                  <div class="col-sm-12">
                  <label for="" class="control-label label-title">Name</label>
                    <input type="text" class="form-control" id="fac_fname" name="fac_fname" placeholder="First Name" value="">
                    <input type="text" class="form-control" id="fac_mi" name="fac_mi" placeholder="M.I" value="">
                    <input type="text" class="form-control" id="fac_lname" name="fac_lname" placeholder="Last Name" value="">
                  </div>
                </div>
                <!--<div class="form-group">
                  <div class="col-sm-12">
                  <label for="" class="control-label label-title">Course</label>
                    <input type="text" class="form-control" id="course" name="course" placeholder="Course" value="dent_course']).'">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                  <label for="" class="control-label label-title">Role</label>
                    <select id="role" name="role" class="form-control">
                      <option value="voter">VOTER</option>
                      <option value="comsel">COMSEL</option>
                      <option value="admin">ADMIN</option>
                    </select>
                    <input type="hidden" class="form-control" id="initrole" placeholder="Role" value="'.$row['role'].'">
                  </div>
                </div>-->
                <div class="form-group">
                  <div class="col-sm-12">
                  <label for="" class="control-label label-title">Email</label>
                    <input type="text" class="form-control" id="fac_email" name="fac_email" placeholder="Email">
                  </div>
                </div>
                <!--<div class="form-group">
                  <div class="col-sm-12">
                  <label for="" class="control-label label-title">Password</label>
                    <input type="password" readonly="readonly" class="form-control" id="" placeholder="Password" value="'.$row['password'].'">
                  </div>
                </div>-->
                <br>
            </form>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="addFacultyBtn">Submit</button>
          </div>  
        </div>
      </div>
    </div>

      <!-- New PM -->
    <div class="modal fade" id="newPM" tabindex="-1" role="dialog" aria-labelledby="newPM">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="editUser">        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Edit User</h4>
          </div>
          <div class="modal-body" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
          </div>  
        </div>
      </div>
    </div>

        <!-- New Translator -->
    <div class="modal fade" id="newT" tabindex="-1" role="dialog" aria-labelledby="newPM">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Create New Translator</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
                  <div class="form-group">
                      <div class="col-xs-12">
                      <label for="" class="control-label label-title">Translator Member</label>
                        <textarea class="form-control" rows="3"  placeholder="Translators"></textarea>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="col-xs-12">
                      <label for="" class="control-label label-title">Project Manager Name</label><br />
                        <select class="selectpicker">
                          <option>Edouard Balde</option>
                          <option>Project Manager 1</option>
                          <option>Project Manager 2</option>
                        </select>
                      </div>
                    </div>
                    <br>
                  </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
          </div>
        </div>
      </div>
    </div>

        <!-- Upload Student Data -->
    <div class="modal fade modal-responsive" id="uploadStudent" tabindex="-1" role="dialog" aria-labelledby="uploadStudent" style="">

      <div class="modal-dialog" role="document">
        <div class="modal-content">
      

          <div class="modal-header">
            <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h3 class="modal-title">Upload Student Data</h3>
          </div>
          <div class="modal-body">

          <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
            <br/><br/>
            <input type="file" class="filestyle" name="file" id="studentfile" data-icon="false"/>
          </form>
          <br/><br/><br/>
          

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmUploadModal">Submit</button>
            <!--button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button-->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal by Lyka from here -->
    <div id="confirmUploadModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Upload</h4>
          </div>
          <div class="modal-body">
            <p>In case of duplicate record, data will be overwritten.</p>
            <br/>
            Continue Upload?
          </div>
          <div class="modal-footer">
            <button type="button" id="cancelUploadBtn" class="btn btn-default" data-dismiss="modal">CANCEL</button>
            <button type="button" id="UploadBtn" class="btn btn-primary" data-dismiss="modal">Continue</button>
          </div>
        </div>

      </div>
    </div>


    <div id="confirmEmailBlastModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Email Blast</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to send email to these students now?</p>
            <br/>
          </div>
          <div class="modal-footer">
            <button type="button" id="cancelUploadBtn" class="btn btn-default" data-dismiss="modal">CANCEL</button>
            <button type="button" id="sendEmailBtn" class="btn btn-primary" data-dismiss="modal">SEND EMAIL</button>
          </div>
        </div>

      </div>
    </div>
    <!-- Modal by Lyka up to here -->

    <!-- 2nd Modal by Lyka from here -->
    <div id="alertModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false"></div>
    <div id="messageModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
          </div>
        </div>

      </div>
    </div>
    <!-- 2nd Modal by Lyka up to here -->


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
    <script type="text/javascript">
    $(function () {

        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

        $('#dateOnAdminElection').datepicker({
            startDate: today,
            todayHighlight: true,
            toggleActive: true
        });

        $('#updateElectionBtn').click(function(){
          $('#formEditElection').ajaxSubmit({
              type: "POST",
              url: "update_election.php?elect=<?php echo $GLOBALS['electionId']?>",
              data: $('#formEditElection').serialize(),
              cache: false,
              success: function (response) { console.log(response);
                //alert("Successfully Uploaded!");
                /*$('#messageModal').find('p').html("<h2 class='heading text-center'>"+response+"</h2>");
                $('#messageModal').modal("show");*/
                //BootstrapDialog.alert('This is working. Uncomment me to try XD');
                if(response.trim() != "error")
                {
                  BootstrapDialog.show({
                    title: 'Success',
                      message: 'Election Details Successfully Updated!',
                      buttons: [{
                        label: 'Close',
                          action: function(dialog) {
                            //dialog.close();
                            location.reload();
                          }
                      }]
                  });
                }
                else
                {
                  //alert("Upload Failed! Something went wrong!");
                  $('#messageModal').find('p').html("<h2 class='heading text-center'>Something went wrong. Please contact your technical team</h2>");
                  $('#messageModal').modal("show");
                }                
              }
          });
        });

        $('#addFacultyBtn').click(function(){
          $('#alertModal').html("<center><img src='./images/loading.gif' style='margin-top:10%'/></center>");
          $('#alertModal').modal("show");
          alert();
          $('#formAddFaculty').ajaxSubmit({
            type: "POST",
            url: "add_faculty.php?elect=<?php echo $GLOBALS['electionId']?>",
            data: $('#formAddFaculty').serialize(),
            cache: false,
            success: function (response) { console.log(response);
              $('#alertModal').modal("hide");
              if(response.trim() != "error")
              {
                BootstrapDialog.show({
                  title: 'Success',
                    message: 'Faculty Successfully Added!',
                    buttons: [{
                      label: 'Close',
                        action: function(dialog) {
                          //dialog.close();
                          location.reload();
                        }
                    }]
                });
              }
              else
              {
                //alert("Upload Failed! Something went wrong!");
                $('#messageModal').find('p').html("<h2 class='heading text-center'>Something went wrong. Please contact your technical team</h2>");
                $('#messageModal').modal("show");
              }                
            }
          });
        });
 
        $('#editComselmodal').on('show.bs.modal', function (e) {//alert(fetchURL);
          var userid = $(e.relatedTarget).data('id');
          $.ajax({
              type : 'post',
              url : 'fetch_comsel_record.php', //Here you will fetch records 
              data :  {userid: userid, electionId: <?php echo $GLOBALS['electionId']?>}, //Pass $id
              success : function(data){
              $('#editComsel').html(data);//Show fetched data from database
              }
          });
       });

        $('#editStudentmodal').on('show.bs.modal', function (e) {
          var studentid = $(e.relatedTarget).data('id');
          $.ajax({
              type : 'post',
              url : 'fetch_student_record.php', //Here you will fetch records 
              data :  {studentid: studentid, electionId: <?php echo $GLOBALS['electionId']?>}, //Pass $id
              success : function(data){
                $('#editStudent').html(data);//Show fetched data from database
              }
          });
       });

      $('#sendEmailBtn').click(function(){
        //$('#loadingmessage').show();
        $('#alertModal').html("<center><img src='./images/sending6.gif' style='margin-top:10%'/></center>");
        $('#alertModal').modal("show");
        $.ajax({
              type : 'post',
              url : 'send_access_thru_email.php', //Here you will fetch records 
              data :  'electionId='+ <?php echo $GLOBALS['electionId']?>, //Pass $id
              success : function(data){ console.log(data);
                $('#alertModal').modal("hide");
                BootstrapDialog.show({
                  title: 'Success',
                    message: 'Emails Successfully Sent!',
                    buttons: [{
                      label: 'Close',
                        action: function(dialog) {
                          dialog.close();
                          //location.reload();
                        }
                    }]
                });
              }
          });
      });

      

      $('#confirmUploadModal').modal("hide").on('show.bs.modal', function(){
        $('#uploadStudent').modal("hide");
        //$('#uploadStudent').modal("hide");
      });

      $("#cancelUploadBtn").click(function(){
        $('#uploadStudent').modal("show");
      });

      $('#UploadBtn').click(function(){ //alert("hii");
        //console.log($('#studentfile'));
          $('#uploadForm').ajaxSubmit({
            type: "POST",
            url: "upload.php?elect=<?php echo $GLOBALS['electionId']?>",
            data: $('#uploadForm').serialize(),
            cache: false,
            success: function (response) { console.log(response);
              //alert("Successfully Uploaded!");
              /*$('#messageModal').find('p').html("<h2 class='heading text-center'>"+response+"</h2>");
              $('#messageModal').modal("show");*/
              //BootstrapDialog.alert('This is working. Uncomment me to try XD');
              BootstrapDialog.show({
                title: 'Success',
                  message: 'File Successfully Uploaded!',
                  buttons: [{
                    label: 'Close',
                      action: function(dialog) {
                        //dialog.close();
                        location.reload();
                      }
                  }]
              });
            },
            error: function(response) {
              //alert("Upload Failed! Something went wrong!");
              $('#messageModal').find('p').html("<h2 class='heading text-center'>Please contact your technical team</h2>");
              $('#messageModal').modal("show");
            }
        });
      });

      $('#viewModal').modal({
        keyboard: true,
        backdrop: "static",
        show: false,
      }).on('show', function () {
      });

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
    
  $('#cTable').pageMe({pagerSelector:'#cPager',showPrevNext:true,hidePageNumbers:false,perPage:4});
  $('#sTable').pageMe({pagerSelector:'#sPager',showPrevNext:true,hidePageNumbers:false,perPage:4});

});
</script>
  </body>
</html>
