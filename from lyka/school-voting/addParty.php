<?php
	////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
	error_reporting(0);
	@ini_set(‘display_errors’, 0);
	
	if(!isset($_SESSION)) 
    	session_start(); 
	require_once ('dbconnect.php');


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$error = 'false';
		$electionId = $_SESSION['comsel_electionId'];
		$partyId = 0;
		$isIndependent = $_POST['rdo_isDependent'];
		//echo $isPartylist;

		$party_name = $_POST['party_name'];
		//Check first if partylist or independent
		if($isIndependent) {
			if($party_name == "")
				$party_name = "Independent Party";
		}
		
		$party_mission = $_POST['party_mission'];
		$logo_img = '';
		$logo_mime = '';

		//let's upload first the partylist logo
		if (isset($_FILES["partylogo"])) {
			$logo_img = addslashes(file_get_contents($_FILES['partylogo']['tmp_name']));
			$logo_type = getimageSize($_FILES['partylogo']['tmp_name']);	
			$logo_mime = $logo_type['mime'];
		}

		$insert_party = "INSERT INTO party (party_name, party_logo_img, party_logo_type, party_mission, election_id, is_independent)
							VALUES ('$party_name', '{$logo_img}', '{$logo_mime}', '{$party_mission}', $electionId,$isIndependent)";
		$party_result = mysql_query($insert_party);
		if($party_result) 
			$partyId = mysql_insert_id();
		else
			$error = 'true';
		//}

	

		//Time to insert the candidates!
		/*PRESIDENT*/
		$pres_name = $_POST['pres_name'];
		$pres_age = $_POST['pres_age'];
		$pres_course = $_POST['pres_course'];
		$pres_year = $_POST['pres_year'];
		$pres_mission = $_POST['pres_mission'];

		$pres_img = '';
		$pres_img_mime = '';

		if(trim($pres_name) != "")
		{
			//upload first the president picture
			if (isset($_FILES["pres_pic"])) {
				$pres_img = addslashes(file_get_contents($_FILES['pres_pic']['tmp_name']));
				$img_type = getimageSize($_FILES['pres_pic']['tmp_name']);	
				$pres_img_mime = $img_type['mime'];
			}

			$insert_pres = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$pres_name', '$pres_age', '$pres_course', '$pres_year',1,'{$pres_img}','{$pres_img_mime}', '{$pres_mission}', $partyId);";
			$pres_result = mysql_query($insert_pres);
			if(!$pres_result)
				$error = 'true';
		}
		

		/*VICE PRESIDENT*/
		$vpres_name = $_POST['vpres_name'];
		$vpres_age = $_POST['vpres_age'];
		$vpres_course = $_POST['vpres_course'];
		$vpres_year = $_POST['vpres_year'];
		$vpres_mission = $_POST['vpres_mission'];

		$vpres_img = '';
		$vpres_img_mime = '';

		if(trim($vpres_name) != "")
		{
			//upload first the vice president picture
			if (isset($_FILES["vpres_pic"])) {
				$vpres_img = addslashes(file_get_contents($_FILES['vpres_pic']['tmp_name']));
				$vimg_type = getimageSize($_FILES['vpres_pic']['tmp_name']);	
				$vpres_img_mime = $vimg_type['mime'];
			}

			$insert_vpres = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$vpres_name', '$vpres_age', '$vpres_course', '$vpres_year',2,'{$vpres_img}','{$vpres_img_mime}', '{$vpres_mission}', $partyId);";
			$vpres_result = mysql_query($insert_vpres);
			if(!$vpres_result)
				$error = 'true';
		}		


		/*SECRETARY*/
		$sec_name = $_POST['sec_name'];
		$sec_age = $_POST['sec_age'];
		$sec_course = $_POST['sec_course'];
		$sec_year = $_POST['sec_year'];
		$sec_mission = $_POST['sec_mission'];

		$sec_img = '';
		$sec_img_mime = '';

		if(trim($sec_name) != "")
		{
			//upload first the secretary picture
			if (isset($_FILES["sec_pic"])) {
				$sec_img = addslashes(file_get_contents($_FILES['sec_pic']['tmp_name']));
				$sec_img_type = getimageSize($_FILES['sec_pic']['tmp_name']);	
				$sec_img_mime = $sec_img_type['mime'];
			}

			$insert_sec = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$sec_name', '$sec_age', '$sec_course', '$sec_year',3,'{$sec_img}','{$sec_img_mime}', '{$sec_mission}',$partyId);";
			$sec_result = mysql_query($insert_sec);
			if(!$sec_result)
				$error = 'true';
		}
		

		/*TREASURER*/
		$treas_name = $_POST['treas_name'];
		$treas_age = $_POST['treas_age'];
		$treas_course = $_POST['treas_course'];
		$treas_year = $_POST['treas_year'];
		$treas_mission = $_POST['treas_mission'];

		$treas_img = '';
		$treas_img_mime = '';

		if(trim($treas_name) != "")
		{
			//upload first the treasurer picture
			if (isset($_FILES["treas_pic"])) {
				$treas_img = addslashes(file_get_contents($_FILES['treas_pic']['tmp_name']));
				$treas_img_type = getimageSize($_FILES['treas_pic']['tmp_name']);	
				$treas_img_mime = $treas_img_type['mime'];
			}

			$insert_treas = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$treas_name', '$treas_age', '$treas_course', '$treas_year',4,'{$treas_img}','{$treas_img_mime}', '{$treas_mission}',$partyId);";
			$treas_result = mysql_query($insert_treas);
			if(!$treas_result)
				$error = 'true';
		}
		

		/*FIRST YEAR*/
		$firstRep_name = $_POST['firstRep_name'];
		$firstRep_age = $_POST['firstRep_age'];
		$firstRep_course = $_POST['firstRep_course'];
		$firstRep_year = $_POST['firstRep_year'];
		$firstRep_mission = $_POST['firstRep_mission'];

		$firstRep_img = '';
		$firstRep_img_mime = '';

		if(trim($firstRep_name) != "")
		{
			//upload first the 1st yr rep picture
			if (isset($_FILES["firstRep_pic"])) {
				$firstRep_img = addslashes(file_get_contents($_FILES['firstRep_pic']['tmp_name']));
				$firstRep_img_type = getimageSize($_FILES['firstRep_pic']['tmp_name']);	
				$firstRep_img_mime = $firstRep_img_type['mime'];
			}

			$insert_firstRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$firstRep_name', '$firstRep_age', '$firstRep_course', '$firstRep_year',5,'{$firstRep_img}','{$firstRep_img_mime}', '{$firstRep_mission}', $partyId);";
			$firstRep_result = mysql_query($insert_firstRep);
			if(!$firstRep_result)
				$error = 'true';
		}
		

		/*SECOND YEAR*/
		$secondRep_name = $_POST['secondRep_name'];
		$secondRep_age = $_POST['secondRep_age'];
		$secondRep_course = $_POST['secondRep_course'];
		$secondRep_year = $_POST['secondRep_year'];
		$secondRep_mission = $_POST['secondRep_mission'];

		$secondRep_img = '';
		$secondRep_img_mime = '';

		if(trim($secondRep_name) != "")
		{
			//upload first the 2nd yr rep picture
			if (isset($_FILES["secondRep_pic"])) {
				$secondRep_img = addslashes(file_get_contents($_FILES['secondRep_pic']['tmp_name']));
				$secondRep_img_type = getimageSize($_FILES['secondRep_pic']['tmp_name']);	
				$secondRep_img_mime = $secondRep_img_type['mime'];
			}

			$insert_secondRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$secondRep_name', '$secondRep_age', '$secondRep_course', '$secondRep_year',6,'{$secondRep_img}','{$secondRep_img_mime}', '{$secondRep_mission}', $partyId);";
			$secondRep_result = mysql_query($insert_secondRep);
			if(!$secondRep_result)
				$error = 'true';
		}		


		/*THIRD YEAR*/
		$thirdRep_name = $_POST['thirdRep_name'];
		$thirdRep_age = $_POST['thirdRep_age'];
		$thirdRep_course = $_POST['thirdRep_course'];
		$thirdRep_year = $_POST['thirdRep_year'];
		$thirdRep_mission = $_POST['thirdRep_mission'];

		$thirdRep_img = '';
		$thirdRep_img_mime = '';

		if(trim($thirdRep_name) != "")
		{
			//upload first the 3rd yr rep picture
			if (isset($_FILES["thirdRep_pic"])) {
				$thirdRep_img = addslashes(file_get_contents($_FILES['thirdRep_pic']['tmp_name']));
				$thirdRep_img_type = getimageSize($_FILES['thirdRep_pic']['tmp_name']);	
				$thirdRep_img_mime = $thirdRep_img_type['mime'];
			}

			$insert_thirdRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$thirdRep_name', '$thirdRep_age', '$thirdRep_course', '$thirdRep_year',7,'{$thirdRep_img}','{$thirdRep_img_mime}', '{$thirdRep_mission}', $partyId);";
			$thirdRep_result = mysql_query($insert_thirdRep);
			if(!$thirdRep_result)
				$error = 'true';
		}
		

		/*FOURTH YEAR*/
		$fourthRep_name = $_POST['fourthRep_name'];
		$fourthRep_age = $_POST['fourthRep_age'];
		$fourthRep_course = $_POST['fourthRep_course'];
		$fourthRep_year = $_POST['fourthRep_year'];
		$fourthRep_mission = $_POST['fourthRep_mission'];

		$fourthRep_img = '';
		$fourthRep_img_mime = '';

		if(trim($fourthRep_name) != "")
		{
			//upload first the 4th yr rep picture
			if (isset($_FILES["fourthRep_pic"])) {
				$fourthRep_img = addslashes(file_get_contents($_FILES['fourthRep_pic']['tmp_name']));
				$fourthRep_img_type = getimageSize($_FILES['fourthRep_pic']['tmp_name']);	
				$fourthRep_img_mime = $fourthRep_img_type['mime'];
			}

			$insert_fourthRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
								VALUES ('$fourthRep_name', '$fourthRep_age', '$fourthRep_course', '$fourthRep_year',8,'{$fourthRep_img}','{$fourthRep_img_mime}', '{$fourthRep_mission}', $partyId);";
			$fourthRep_result = mysql_query($insert_fourthRep);
			if(!$fourthRep_result)
				$error = 'true';
		}
		
		echo $error;
	}

	
?>