<?php

////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

require_once ('dbconnect.php');

if($_POST['partyid']) { ;
	$id = $_POST['partyid']; //escape string

    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
    $query = "SELECT * FROM party a left join candidate b on b.candidate_party_id = a.party_id left join position c on b.candidate_position_id=c.id 
                      where a.party_id={$id}
                      
                      order by b.candidate_position_id";
    $result = mysql_query($query);

    if($result === FALSE) { 
      die(mysql_error()); // TODO: better error handling
    }

    $candidates = array();

    while($row = mysql_fetch_array($result)){

      $candidates['party_name'] = $row['party_name'];
      $candidates['is_independent'] = $row['is_independent'];
      $candidates['party_mission'] = $row['party_mission'];
      $candidates['party_pic'] = $row['party_logo_img'];

      if($row['candidate_position_id'] == 1)
      {
        $candidates['pres_id'] = $row['candidate_id'];
        $candidates['pres_name'] = $row['candidate_name'];
        $candidates['pres_age'] = $row['candidate_age'];
        $candidates['pres_course'] = $row['candidate_course'];
        $candidates['pres_year'] = $row['candidate_year'];
        $candidates['pres_mission'] = $row['candidate_mission'];
        $candidates['pres_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 2)
      {
        $candidates['vpres_id'] = $row['candidate_id'];
        $candidates['vpres_name'] = $row['candidate_name'];
        $candidates['vpres_age'] = $row['candidate_age'];
        $candidates['vpres_course'] = $row['candidate_course'];
        $candidates['vpres_year'] = $row['candidate_year'];
        $candidates['vpres_mission'] = $row['candidate_mission'];
        $candidates['vpres_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 3)
      {
        $candidates['sec_id'] = $row['candidate_id'];
        $candidates['sec_name'] = $row['candidate_name'];
        $candidates['sec_age'] = $row['candidate_age'];
        $candidates['sec_course'] = $row['candidate_course'];
        $candidates['sec_year'] = $row['candidate_year'];
        $candidates['sec_mission'] = $row['candidate_mission'];
        $candidates['sec_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 4)
      {
        $candidates['treas_id'] = $row['candidate_id'];
        $candidates['treas_name'] = $row['candidate_name'];
        $candidates['treas_age'] = $row['candidate_age'];
        $candidates['treas_course'] = $row['candidate_course'];
        $candidates['treas_year'] = $row['candidate_year'];
        $candidates['treas_mission'] = $row['candidate_mission'];
        $candidates['treas_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 5)
      {
        $candidates['firstyr_id'] = $row['candidate_id'];
        $candidates['firstyr_name'] = $row['candidate_name'];
        $candidates['firstyr_age'] = $row['candidate_age'];
        $candidates['firstyr_course'] = $row['candidate_course'];
        $candidates['firstyr_year'] = $row['candidate_year'];
        $candidates['firstyr_mission'] = $row['candidate_mission'];
        $candidates['firstyr_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 6)
      {
        $candidates['secondyr_id'] = $row['candidate_id'];
        $candidates['secondyr_name'] = $row['candidate_name'];
        $candidates['secondyr_age'] = $row['candidate_age'];
        $candidates['secondyr_course'] = $row['candidate_course'];
        $candidates['secondyr_year'] = $row['candidate_year'];
        $candidates['secondyr_mission'] = $row['candidate_mission'];
        $candidates['secondyr_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 7)
      {
        $candidates['thirdyr_id'] = $row['candidate_id'];
        $candidates['thirdyr_name'] = $row['candidate_name'];
        $candidates['thirdyr_age'] = $row['candidate_age'];
        $candidates['thirdyr_course'] = $row['candidate_course'];
        $candidates['thirdyr_year'] = $row['candidate_year'];
        $candidates['thirdyr_mission'] = $row['candidate_mission'];
        $candidates['thirdyr_pic'] = $row['candidate_picture'];
      }
      if($row['candidate_position_id'] == 8)
      {
        $candidates['fourthyr_id'] = $row['candidate_id'];
        $candidates['fourthyr_name'] = $row['candidate_name'];
        $candidates['fourthyr_age'] = $row['candidate_age'];
        $candidates['fourthyr_course'] = $row['candidate_course'];
        $candidates['fourthyr_year'] = $row['candidate_year'];
        $candidates['fourthyr_mission'] = $row['candidate_mission'];
        $candidates['fourthyr_pic'] = $row['candidate_picture'];
      }
    }

    /*
    echo "<pre>";
    print_r($candidates);
    echo "</pre>";
  */

	echo '
	  <div class="modal-header">
	    <h3 class="modal-title">Edit Partylist</h3>
	  </div>
	  <div class="modal-body">
	    <form class="form-horizontal" id="editPartyForm" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <h3 class="text-success"><b>Partylist</b></h3>
                       <label class="radio-inline"><input type="radio" id="is_party" name="rdo_isDependent" value="0">New Partylist</label>
                       <label class="radio-inline"><input type="radio" id="is_independent" name="rdo_isDependent" value="1">Independent</label>
                       <input type="hidden" class="form-control" id="isIndependent" name="isIndependent" value="'.$candidates['is_independent'].'">
                       <input type="hidden" class="form-control" id="party_id" name="party_id" value="'.$id.'">
                      </div>
                    </div>
                    <div class="form-group">
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Partylist Logo</label>
                      
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['party_pic'] ).'"/>
                      <input type="file" class="filestyle" name="partylogo" id="partylogo" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">Partylist Name</label>
                        <input type="" class="form-control" id="party_name" name="party_name" placeholder="Partylist Name" value="'.$candidates['party_name'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="party_mission" name="party_mission" rows="3">'.$candidates['party_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>President</b></h3>
                      </div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">President Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['pres_pic'] ).'"/>
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
                        <input type="" class="form-control" id="pres_name" name="pres_name" placeholder="President Name" value="'.$candidates['pres_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="pres_age" name="pres_age" placeholder="Age" value="'.$candidates['pres_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="pres_course" name="pres_course" placeholder="Course" value="'.$candidates['pres_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="pres_year" name="pres_year" placeholder="Year" value="'.$candidates['pres_year'].'">
                        <input type="hidden" class="form-control" id="pres_id" name="pres_id" value="'.$candidates['pres_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="pres_mission" name="pres_mission" rows="3">'.$candidates['pres_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>Vice-President</b></h3>
                      </div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Vice-President Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['vpres_pic'] ).'"/>
                      <input type="file" class="filestyle" name="vpres_pic" id="vpres_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">Vice-President Name</label>
                        <input type="" class="form-control" id="vpres_name" name="vpres_name" placeholder="Vice-President Name" value="'.$candidates['vpres_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="vpres_age" name="vpres_age" placeholder="Age" value="'.$candidates['vpres_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="vpres_course" name="vpres_course" placeholder="Course" value="'.$candidates['vpres_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="vpres_year" name="vpres_year" placeholder="Year" value="'.$candidates['vpres_year'].'">
                        <input type="hidden" class="form-control" id="vpres_id" name="vpres_id" value="'.$candidates['vpres_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="vpres_mission" name="vpres_mission" rows="3">'.$candidates['vpres_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>Secritary</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Secritary Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['sec_pic'] ).'"/>
                      <input type="file" class="filestyle" name="sec_pic" id="sec_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">Secretary Name</label>
                        <input type="" class="form-control" id="sec_name" name="sec_name" placeholder="Secretary Name" value="'.$candidates['sec_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="sec_age" name="sec_age" placeholder="Age" value="'.$candidates['sec_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="sec_course" name="sec_course" placeholder="Course" value="'.$candidates['sec_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="sec_year" name="sec_year" placeholder="Year" value="'.$candidates['sec_year'].'">
                        <input type="hidden" class="form-control" id="sec_id" name="sec_id" value="'.$candidates['sec_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="sec_mission" name="sec_mission" rows="3">'.$candidates['sec_mission'].'</textarea>
                      </div>
                    </div>
                     <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>Treasurer</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">Treasurer Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['treas_pic'] ).'"/>
                      <input type="file" class="filestyle" name="treas_pic" id="treas_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                      <label for="inputEmail3" class="control-label label-title">Treasurer Name</label>
                        <input type="" class="form-control" id="treas_name" name="treas_name" placeholder="Treasurer Name" value="'.$candidates['treas_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="treas_age" name="treas_age" placeholder="Age" value="'.$candidates['treas_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="treas_course" name="treas_course" placeholder="Course" value="'.$candidates['treas_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="treas_year" name="treas_year" placeholder="Year" value="'.$candidates['treas_year'].'">
                        <input type="hidden" class="form-control" id="treas_id" name="treas_id" value="'.$candidates['treas_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" id="treas_mission" name="treas_mission" rows="3">'.$candidates['treas_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>4th Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">4th Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['fourthyr_pic'] ).'"/>
                      <input type="file" class="filestyle" name="fourthRep_pic" id="fourthRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">4th Year Name</label>
                        <input type="" class="form-control" id="fourthRep_name" name="fourthRep_name" placeholder="4th Year Name" value="'.$candidates['fourthyr_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="fourthRep_age" name="fourthRep_age" placeholder="Age" value="'.$candidates['fourthyr_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="fourthRep_course" name="fourthRep_course" placeholder="Course" value="'.$candidates['fourthyr_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="fourthRep_year" name="fourthRep_year" placeholder="Year" value="'.$candidates['fourthyr_year'].'">
                        <input type="hidden" class="form-control" id="fourthRep_id" name="fourthRep_id" value="'.$candidates['fourthyr_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="fourthRep_mission" id="fourthRep_mission" rows="3">'.$candidates['fourthyr_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>3rd Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">3rd Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['thirdyr_pic'] ).'"/>
                      <input type="file" class="filestyle" name="thirdRep_pic" id="thirdRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">3rd Year Name</label>
                        <input type="" class="form-control" id="thirdRep_name" name="thirdRep_name" placeholder="3rd Year Name" value="'.$candidates['thirdyr_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="thirdRep_age" name="thirdRep_age" placeholder="Age" value="'.$candidates['thirdyr_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="thirdRep_course" name="thirdRep_course" placeholder="Course" value="'.$candidates['thirdyr_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="thirdRep_year" name="thirdRep_year" placeholder="Year" value="'.$candidates['thirdyr_year'].'">
                        <input type="hidden" class="form-control" id="thirdRep_id" name="thirdRep_id" value="'.$candidates['thirdyr_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="thirdRep_mission" id="thirdRep_mission" rows="3">'.$candidates['thirdyr_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>2nd Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">2nd Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['secondyr_pic'] ).'"/>
                      <input type="file" class="filestyle" name="secondRep_pic" id="secondRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">2nd Year Name</label>
                        <input type="" class="form-control" id="secondRep_name" name="secondRep_name" placeholder="2nd Year Name" value="'.$candidates['secondyr_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="secondRep_age" name="secondRep_age" placeholder="Age" value="'.$candidates['secondyr_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="secondRep_course" name="secondRep_course" placeholder="Course" value="'.$candidates['secondyr_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="secondRep_year" name="secondRep_year" placeholder="Year" value="'.$candidates['secondyr_year'].'">
                        <input type="hidden" class="form-control" id="secondRep_id" name="secondRep_id" value="'.$candidates['secondyr_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="secondRep_mission" id="secondRep_mission" rows="3">'.$candidates['secondyr_mission'].'</textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                     <div class="col-sm-12"><h3 class="text-success"><b>1st Year Representative</b></h3></div>
                     <div class="col-sm-3">
                      <label for="inputEmail3" class="control-label label-title">1st Year Picture</label>
                      <!--button type="button" class="btn btn-default form-control ">Browse</button-->
                      <img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode( $candidates['firstyr_pic'] ).'"/>
                      <input type="file" class="filestyle" name="firstRep_pic" id="firstRep_pic" data-icon="false"/>
                      </div>
                      <div class="col-sm-9">
                        <label for="inputEmail3" class="control-label label-title">1st Year Name</label>
                        <input type="" class="form-control" id="firstRep_name" name="firstRep_name" placeholder="1st Year Name" value="'.$candidates['firstyr_name'].'">
                        <label for="inputEmail3" class="control-label label-title">Age</label>
                        <input type="" class="form-control" id="firstRep_age" name="firstRep_age" placeholder="Age" value="'.$candidates['firstyr_age'].'">
                        <label for="inputEmail3" class="control-label label-title">Course</label>
                        <input type="" class="form-control" id="firstRep_course" name="firstRep_course" placeholder="Course" value="'.$candidates['firstyr_course'].'">
                        <label for="inputEmail3" class="control-label label-title">Year</label>
                        <input type="" class="form-control" id="firstRep_year" name="firstRep_year" placeholder="Year" value="'.$candidates['firstyr_year'].'">
                        <input type="hidden" class="form-control" id="firstRep_id" name="firstRep_id" value="'.$candidates['firstyr_id'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Mission / Vision</label>
                         <textarea class="form-control" name="firstRep_mission" id="firstRep_mission" rows="3">'.$candidates['firstyr_mission'].'</textarea>
                      </div>
                    </div>
                  </form>
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	    <button type="button" class="btn btn-primary" data-dismiss="modal" id="updatePartyBtn">Submit</button>
	  </div>
	';
	//}
}
?>

<script type="text/javascript">
	$(document).ready(function(){

    var isIndependent = $('#isIndependent').val();
    if(isIndependent == 0)
      $('#is_party').prop('checked', true);
    else if(isIndependent == 1)
      $('#is_independent').prop('checked', true);

    $("#updatePartyBtn").click(function(){
      $("#editPartyForm").ajaxSubmit({
          type : 'post',
          url : 'update_party.php', //Here you will fetch records 
          data :  $('#editPartyForm').serialize(), //Pass $id
          success : function(data){ console.log(data);
            /*BootstrapDialog.show({
                  title: 'Success',
                    message: 'Party Successfully Updated!',
                    buttons: [{
                      label: 'Close',
                        action: function(dialog) {
                          //dialog.close();
                          location.reload();
                        }
                    }]
                });
          */}
      });
    });

	});
</script>
