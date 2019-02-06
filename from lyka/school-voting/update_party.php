<?php

////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
error_reporting(0);
@ini_set(‘display_errors’, 0);

  if(!isset($_SESSION)) 
    session_start(); 
  require_once ('dbconnect.php');

 print_r($_FILES);
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = 'false';
    $electionId = $_SESSION['comsel_electionId'];
    $partyId = $_POST['party_id'];
    $isIndependent = $_POST['rdo_isDependent'];
    
    $party_name = $_POST['party_name'];
    $party_mission = $_POST['party_mission'];
    $logo_img = '';
    $logo_mime = '';
    
    //let's upload first the partylist logo
    if (isset($_FILES["partylogo"])) {
      $logo_img = addslashes(file_get_contents($_FILES['partylogo']['tmp_name']));
      $logo_type = getimageSize($_FILES['partylogo']['tmp_name']);  
      $logo_mime = $logo_type['mime'];
    
      $update_party = "UPDATE party SET party_name='$party_name', party_logo_img='{$logo_img}', party_logo_type='{$logo_mime}', party_mission='{$party_mission}'
                          , election_id=$electionId, is_independent=$isIndependent WHERE party_id=$partyId;";
      $party_result = mysql_query($update_party);
      if(!$party_result) 
        $error = 'true';
    }
    else
    {
      $update_party = "UPDATE party SET party_name='$party_name', party_mission='{$party_mission}', election_id=$electionId, is_independent=$isIndependent 
                        WHERE party_id=$partyId;";
      $party_result = mysql_query($update_party);
      if(!$party_result) 
        $error = 'true';
    }
  

    //Time to update the candidates!
    /*PRESIDENT*/
    $pres_id = $_POST['pres_id'];
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

        if($pres_id != '')
        {
          $update_pres = "UPDATE candidate SET candidate_name='$pres_name', candidate_age='$pres_age', candidate_course='$pres_course', candidate_year='$pres_year'
                            , candidate_picture='{$pres_img}', candidate_picture_type='{$pres_img_mime}', candidate_mission='{$pres_mission}'
                          WHERE candidate_id=$pres_id;";
          $pres_result = mysql_query($update_pres);
          if(!$pres_result)
            $error = 'true';        
        }
      }
      else
      {
        if($pres_id != '')
        {
          $update_pres = "UPDATE candidate SET candidate_name='$pres_name', candidate_age='$pres_age', candidate_course='$pres_course', candidate_year='$pres_year'
                            , candidate_mission='{$pres_mission}'
                          WHERE candidate_id=$pres_id;";
          $pres_result = mysql_query($update_pres);
          if(!$pres_result)
            $error = 'true';        
        }
      }

      if($pres_id == '')
      {
        $insert_pres = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                        VALUES ('$pres_name', '$pres_age', '$pres_course', '$pres_year',1,'{$pres_img}','{$pres_img_mime}', '{$pres_mission}', $partyId);";
        $pres_result = mysql_query($insert_pres);
        if(!$pres_result)
          $error = 'true';
      }
            
    }
    

    /*VICE PRESIDENT*/
    $vpres_id = $_POST['vpres_id'];
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

        if($vpres_id != '')
        {
          $update_vpres = "UPDATE candidate SET candidate_name='$vpres_name', candidate_age='$vpres_age', candidate_course='$vpres_course', candidate_year='$vpres_year'
                            , candidate_picture='{$vpres_img}', candidate_picture_type='{$vpres_img_mime}', candidate_mission='{$vpres_mission}'
                          WHERE candidate_id = $vpres_id;";
          $vpres_result = mysql_query($update_vpres);
          if(!$vpres_result)
            $error = 'true';
        }   
      }
      else
      {
        if($vpres_id != '')
        {
          $update_vpres = "UPDATE candidate SET candidate_name='$vpres_name', candidate_age='$vpres_age', candidate_course='$vpres_course', candidate_year='$vpres_year'
                            , candidate_mission='{$vpres_mission}'
                          WHERE candidate_id = $vpres_id;";
          $vpres_result = mysql_query($update_vpres);
          if(!$vpres_result)
            $error = 'true';
        }  
      }

      if($vpres_id == '')
      {
        $insert_vpres = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                        VALUES ('$vpres_name', '$vpres_age', '$vpres_course', '$vpres_year',2,'{$vpres_img}','{$vpres_img_mime}', '{$vpres_mission}', $partyId);";
        $vpres_result = mysql_query($insert_vpres);
        if(!$vpres_result)
          $error = 'true';
      }
      
    }   


    /*SECRETARY*/
    $sec_id = $_POST['sec_id'];
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

        if($sec_id != '')
        {
          $update_sec = "UPDATE candidate SET candidate_name='$sec_name', candidate_age='$sec_age', candidate_course='$sec_course', candidate_year='$sec_year'
                          , candidate_picture='{$sec_img}', candidate_picture_type='{$sec_img_mime}', candidate_mission='{$sec_mission}'
                        WHERE candidate_id=$sec_id;";
          $sec_result = mysql_query($update_sec);
          if(!$sec_result)
            $error = 'true';
        }
      }
      else
      {
        if($sec_id != '')
        {
          $update_sec = "UPDATE candidate SET candidate_name='$sec_name', candidate_age='$sec_age', candidate_course='$sec_course', candidate_year='$sec_year'
                          , candidate_mission='{$sec_mission}'
                        WHERE candidate_id=$sec_id;";
          $sec_result = mysql_query($update_sec);
          if(!$sec_result)
            $error = 'true';
        }
      }
      
      if($sec_id == '')
      {
        $insert_sec = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                        VALUES ('$sec_name', '$sec_age', '$sec_course', '$sec_year',3,'{$sec_img}','{$sec_img_mime}', '{$sec_mission}',$partyId);";
        $sec_result = mysql_query($insert_sec);
        if(!$sec_result)
          $error = 'true';
      }
    }
    

    /*TREASURER*/
    $treas_id = $_POST['treas_id'];
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

        if($treas_id != '')
        {
          $update_treas = "UPDATE candidate SET candidate_name='$treas_name', candidate_age='$treas_age', candidate_course='$treas_course', candidate_year='$treas_year'
                            , candidate_picture='{$treas_img}', candidate_picture_type='{$treas_img_mime}', candidate_mission='{$treas_mission}'
                          WHERE candidate_id = $treas_id;";
          $treas_result = mysql_query($update_treas);
          if(!$treas_result)
            $error = 'true';
        }
      }
      else
      {
        if($treas_id != '')
        {
          $update_treas = "UPDATE candidate SET candidate_name='$treas_name', candidate_age='$treas_age', candidate_course='$treas_course', candidate_year='$treas_year'
                            , candidate_picture='{$treas_img}', candidate_picture_type='{$treas_img_mime}', candidate_mission='{$treas_mission}'
                          WHERE candidate_id = $treas_id;";
          $treas_result = mysql_query($update_treas);
          if(!$treas_result)
            $error = 'true';
        }
      }

      if($treas_id == '')
      {
        $insert_treas = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                        VALUES ('$treas_name', '$treas_age', '$treas_course', '$treas_year',4,'{$treas_img}','{$treas_img_mime}', '{$treas_mission}',$partyId);";
        $treas_result = mysql_query($insert_treas);
        if(!$treas_result)
          $error = 'true';
      }
      
    }
    

    /*FIRST YEAR*/
    $firstRep_id = $_POST['firstRep_id'];
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

        if($firstRep_id != '')
        {
          $update_firstRep = "UPDATE candidate SET candidate_name='$firstRep_name', candidate_age='$firstRep_age', candidate_course='$firstRep_course', candidate_year='$firstRep_year'
                                , candidate_picture='{$firstRep_img}', candidate_picture_type='{$firstRep_img_mime}', candidate_mission='{$firstRep_mission}' 
                              WHERE candidate_id = $firstRep_id;";
          $firstRep_result = mysql_query($update_firstRep);
          if(!$firstRep_result)
            $error = 'true';
        }
      }
      else
      {
        if($firstRep_id != '')
        {
          $update_firstRep = "UPDATE candidate SET candidate_name='$firstRep_name', candidate_age='$firstRep_age', candidate_course='$firstRep_course', candidate_year='$firstRep_year'
                                , candidate_mission='{$firstRep_mission}' 
                              WHERE candidate_id = $firstRep_id;";
          $firstRep_result = mysql_query($update_firstRep);
          if(!$firstRep_result)
            $error = 'true';
        }
      }

      if($firstRep_id == '')
      {
        $insert_firstRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                            VALUES ('$firstRep_name', '$firstRep_age', '$firstRep_course', '$firstRep_year',5,'{$firstRep_img}','{$firstRep_img_mime}', '{$firstRep_mission}', $partyId);";
        $firstRep_result = mysql_query($insert_firstRep);
        if(!$firstRep_result)
          $error = 'true';
      }
    }
    

    /*SECOND YEAR*/
    $secondRep_id = $_POST['secondRep_id'];
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

        if($secondRep_id != '')
        {
          $update_secondRep = "UPDATE candidate SET candidate_name='$secondRep_name', candidate_age='$secondRep_age', candidate_course='$secondRep_course', candidate_year='$secondRep_year'
                                , candidate_picture='{$secondRep_img}', candidate_picture_type='{$secondRep_img_mime}', candidate_mission='{$secondRep_mission}'
                              WHERE candidate_id = $secondRep_id;";
          $secondRep_result = mysql_query($update_secondRep);
          if(!$secondRep_result)
            $error = 'true';
        }
      }
      else
      {
        if($secondRep_id != '')
        {
          $update_secondRep = "UPDATE candidate SET candidate_name='$secondRep_name', candidate_age='$secondRep_age', candidate_course='$secondRep_course', candidate_year='$secondRep_year'
                                ,. candidate_mission='{$secondRep_mission}'
                              WHERE candidate_id = $secondRep_id;";
          $secondRep_result = mysql_query($update_secondRep);
          if(!$secondRep_result)
            $error = 'true';
        }
      }
      
      if($secondRep_id == '')
      {
        $insert_secondRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                            VALUES ('$secondRep_name', '$secondRep_age', '$secondRep_course', '$secondRep_year',6,'{$secondRep_img}','{$secondRep_img_mime}', '{$secondRep_mission}', $partyId);";
        $secondRep_result = mysql_query($insert_secondRep);
        if(!$secondRep_result)
          $error = 'true';
      }
      
    }   


    /*THIRD YEAR*/
    $thirdRep_id = $_POST['thirdRep_id'];
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

        if($thirdRep_id != '')
        {
          $update_thirdRep = "UPDATE candidate SET candidate_name='$thirdRep_name', candidate_age='$thirdRep_age', candidate_course='$thirdRep_course', candidate_year='$thirdRep_year'
                                , candidate_picture='{$thirdRep_img}', candidate_picture_type='{$thirdRep_img_mime}', candidate_mission='{$thirdRep_mission}'
                              WHERE candidate_id = $thirdRep_id;";
          $thirdRep_result = mysql_query($update_thirdRep);
          if(!$thirdRep_result)
            $error = 'true';
        }
      }
      else
      {
        if($thirdRep_id != '')
        {
          $update_thirdRep = "UPDATE candidate SET candidate_name='$thirdRep_name', candidate_age='$thirdRep_age', candidate_course='$thirdRep_course', candidate_year='$thirdRep_year'
                                , candidate_mission='{$thirdRep_mission}'
                              WHERE candidate_id = $thirdRep_id;";
          $thirdRep_result = mysql_query($update_thirdRep);
          if(!$thirdRep_result)
            $error = 'true';
        }
      }
      
      if($thirdRep_id == '')
      {
        $insert_thirdRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                            VALUES ('$thirdRep_name', '$thirdRep_age', '$thirdRep_course', '$thirdRep_year',7,'{$thirdRep_img}','{$thirdRep_img_mime}', '{$thirdRep_mission}', $partyId);";
        $thirdRep_result = mysql_query($insert_thirdRep);
        if(!$thirdRep_result)
          $error = 'true';
      }
      
    }
    

    /*FOURTH YEAR*/
    $fourthRep_id = $_POST['fourthRep_id'];
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

        if($fourthRep_id != '')
        {
          $update_fourthRep = "UPDATE candidate SET candidate_name='$fourthRep_name', candidate_age='$fourthRep_age', candidate_course='$fourthRep_course', candidate_year='$fourthRep_year'
                                , candidate_picture='{$fourthRep_img}', candidate_picture_type='{$fourthRep_img_mime}', candidate_mission='{$fourthRep_mission}'
                              WHERE candidate_id = $fourthRep_id;";
          $fourthRep_result = mysql_query($update_fourthRep);
          if(!$fourthRep_result)
            $error = 'true';
        }
      }
      else
      {
        if($fourthRep_id != '')
        {
          $update_fourthRep = "UPDATE candidate SET candidate_name='$fourthRep_name', candidate_age='$fourthRep_age', candidate_course='$fourthRep_course', candidate_year='$fourthRep_year'
                                , candidate_mission='{$fourthRep_mission}'
                              WHERE candidate_id = $fourthRep_id;";
          $fourthRep_result = mysql_query($update_fourthRep);
          if(!$fourthRep_result)
            $error = 'true';
        }
      }

      if($fourthRep_id == '')
      {
        $insert_fourthRep = "INSERT INTO candidate (candidate_name, candidate_age, candidate_course, candidate_year, candidate_position_id, candidate_picture, candidate_picture_type, candidate_mission, candidate_party_id)
                            VALUES ('$fourthRep_name', '$fourthRep_age', '$fourthRep_course', '$fourthRep_year',8,'{$fourthRep_img}','{$fourthRep_img_mime}', '{$fourthRep_mission}', $partyId);";
        $fourthRep_result = mysql_query($insert_fourthRep);
        if(!$fourthRep_result)
          $error = 'true';
      }
      
    }
    
    echo $error;
  }

  
?>