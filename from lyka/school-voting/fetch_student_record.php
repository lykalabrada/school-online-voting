<?php
////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

require_once ('dbconnect.php');

if($_POST['studentid']) {
	$electionId = $_POST['electionId'];
    $id = $_POST['studentid']; //escape string
    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
    $query = "SELECT a.*,b.*,c.role FROM student_list a left join users b on a.student_id = b.username left join voter_election c on b.username=c.username where a.student_id = '$id' and c.election_id=$electionId";
  	$result = mysql_query($query);

  	if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
	}

  	while($row = mysql_fetch_array($result)){  
    echo '
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit Student</h4>
      </div>
      <div class="modal-body" >

    	<form class="form-horizontal" method="post" action="" id="formEditStudent">
	      <div class="form-group">
	          <div class="col-sm-12">
	          <label for="" class="control-label label-title">#ID</label>
	            <input type="text" readonly="readonly" class="form-control" id="studentId" name="studentId" placeholder="ID" value="'.$row['student_id'].'">
	            <input type="hidden" class="form-control" id="electionId" name="electionId" value="'.$electionId.'">
	          </div>
	        </div>
	         <div class="form-group">
	          <div class="col-sm-12">
	          <label for="" class="control-label label-title">Name</label>
	            <div class="form-inline">
	            <input type="text" class="form-control" id="fname" name="fname" placeholder="Name" value="'.strtoupper($row['student_fname']).'">
	            <input style="width: 50px;" type="text" class="form-control" id="mi" name="mi" placeholder="Name" value="'.strtoupper($row['student_mi']).'">
	            <input type="text" class="form-control" id="lname" name="lname" placeholder="Name" value="'.strtoupper($row['student_lname']).'">
	            </div>
	          </div>
	        </div>
	        <div class="form-group">
	          <div class="col-sm-12">
	          <label for="" class="control-label label-title">Course</label>
	            <input type="text" class="form-control" id="course" name="course" placeholder="Course" value="'.strtoupper($row['student_course']).'">
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
	        </div>
	        <div class="form-group">
	          <div class="col-sm-12">
	          <label for="" class="control-label label-title">Email</label>
	            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="'.$row['student_email'].'">
	          </div>
	        </div>
	        <div class="form-group">
	          <div class="col-sm-12">
	          <label for="" class="control-label label-title">Password</label>
	            <input type="password" readonly="readonly" class="form-control" id="" placeholder="Password" value="'.$row['password'].'">
	          </div>
	        </div>

	        <br>
	    </form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<button type="button" class="btn btn-primary" data-dismiss="modal" id="updateStudent">Submit</button>
	</div>
    ';
}
 }
?>

<script type="text/javascript">
  $("#role").val($("#initrole").val());

  $("#updateStudent").click(function(){
    $.ajax({
        type : 'post',
        url : 'update_student.php', //Here you will fetch records 
        data :  $('#formEditStudent').serialize(), //Pass $id
        success : function(data){ console.log(data);
          BootstrapDialog.show({
                title: 'Success',
                  message: 'Student Successfully Updated!',
                  buttons: [{
                    label: 'Close',
                      action: function(dialog) {
                        //dialog.close();
                        location.reload();
                      }
                  }]
              });
        }
    });
  });

</script>
