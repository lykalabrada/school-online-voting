<?php 
////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

session_start(); 
require_once ('dbconnect.php');
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

    <title>Admin</title>

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
                  <h1>Admin Page</h1>
                </div>
            </div>
          </div>
       </div>
    </nav>
     
  </div>


    <main>
      <div class="container">
        <div class="row">
                  <div class="col-xs-12">
            <button class="btn btn-primary btn-xl btn-float pull-right"  data-toggle="modal" data-target="#newElection">New Election</button>
          </div>
          <div class="col-xs-12">
            <div class="section-title in-progress">
              <h2 class="h3">Election List</h2>
              <div class="in-progress-bar"></div>
            </div>
          </div>


        <?php
          $query = "SELECT * FROM election";
          $result = mysql_query($query);

          while($row = mysql_fetch_array($result)){   
          $electionPage = "./admin-election.php?elect=".$row['election_id'];
          echo "
          <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
            <div class='thumbnail'>
              <div class='caption'>
                <button class='btn btn-default deleteElectionBtn' onclick='deleteElection(".$row['election_id'].")'>Delete</button>         
                <a href='".$electionPage."' class='btn btn-primary  pull-right'>View</a>
                <div class='heading'>
                  <h3>".$row['election_name']."</h3>
                </div>
              </div>
              <div class='separator'></div>
              <div class='thumbnail-section'>
                <h3 class='label-title'>Election Period</h3>
                <ul class='list-inline list-unstyled'>
                  <li>Start: ".date_format(date_create($row['start_date']),'F d, Y')."</li><li><div class='divider'></div></li><li>End: ".date_format(date_create($row['end_date']),'F d, Y')."</li>
                </ul>
              </div>
             </div>
          </div>";
          }
        ?>

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

      <!-- New Eelection -->
    <div class="modal fade" id="newElection" tabindex="-1" role="dialog" aria-labelledby="newElection">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Create New Election</h4>
          </div>
          <iframe name="admin" style="display:none;"></iframe>
          <form class="form-horizontal" id="formCreateElection" name="formCreateElection" method="post" action="">
          <div class="modal-body">
                
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Election Title</label>
                        <input type="text" id="electionName" name="electionName" class="form-control input-lg" placeholder="Election Title">
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Voting Day</label>
                       <div class="input-daterange input-group" id="dateOnAdminElection">
                          <input type="text" id="startDate" name="startDate" class="form-control input-lg" value=""  placeholder="Star Date" name="start" />
                          <span class="input-group-addon">to</span>
                          <input type="text" id="endDate" name="endDate" class="form-control input-lg" value="" placeholder="End Date" name="end" />
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Description</label>
                        <textarea id="electionDesc" name="electionDesc" class="form-control" rows="3"></textarea>
                      </div>
                    </div>
                  
          </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="createElectionBtn">Submit</button>
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

    <!-- Modals by Lyka from here -->
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
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
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
    <script src="js/bootstrap-dialog.min.js"></script>
    <script type="text/javascript">

      $('#messageModal').on('hidden.bs.modal', function () {
       location.reload();
      })

      function deleteElection(electionId){
        BootstrapDialog.show({
          title: 'Confirm Delete',
            message: 'Are you sure you want to delete this election?',
            buttons: [{
              label: 'Yes',
                action: function(dialog) {
                  $.ajax({
                    type : 'post',
                    url : 'delete_record.php', //Here you will fetch records 
                    data :  {id: electionId, type: 'election'}, //Pass $id
                    success : function(data){
                      if(data.trim() != "error")
                      {
                        dialog.close();
                        $('#messageModal').find('p').html("<h4 class='heading text-center'>Election Successfully Deleted.</h4>");
                        $('#messageModal').modal("show");
                      }
                      else
                      {
                        dialog.close();
                        BootstrapDialog.hide();
                        $('#messageModal').find('p').html("<h4 class='heading text-center'>Something went wrong. Please contact your technical team.</h4>");
                        $('#messageModal').modal("show");
                      }
                    }
                  });
                }
            },
            {
              label: 'No',
                action: function(dialog) {
                  dialog.close();
                  //location.reload();
                }
            }
            ]
        });
      }

      $(function () {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

        $('#dateOnAdminElection').datepicker({
            startDate: today,
            todayHighlight: true,
            toggleActive: true
        });
        
        $('#viewModal').modal({
          keyboard: true,
          backdrop: "static",
          show: false,
        }).on('show', function () { });


        $("#table-member").find('tr[data-id]').on('click', function () {
          //let modalDetails = '<span class="label-title">Project Manager</span>';
          //do all your operation populate the modal and open the modal now. DOnt need to use show event of modal again
          //$('#modalDetails').html($(modalDetails));
          $('#viewModal').modal('show');
        });


        $("#createElectionBtn").click(function(){
          $('#formCreateElection').ajaxSubmit({
            type: "POST",
            url: "./createElection.php",
            data: $('#formCreateElection').serialize(),
            cache: false,
            success: function (response) { console.log(response);
              if(response.trim() != "error")
              {
                $("#newElection").modal("hide");
                BootstrapDialog.show({
                  title: 'Success',
                    message: 'New Election Successfully Created!',
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
                $('#messageModal').find('p').html("<h2 class='heading text-center'>Something went wrong. Please contact your technical team.</h2>");
                $('#messageModal').modal("show");
              }
              
            }
          });
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
