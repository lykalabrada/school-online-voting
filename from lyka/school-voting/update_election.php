<?php
  
  ////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
  error_reporting(0);
  @ini_set(‘display_errors’, 0);

  require_once ('dbconnect.php');
  $electionId = $_GET['elect'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  	$electionName = $_POST['electionName'];
  	$startDate = $_POST['startDate'];
  	$endDate = $_POST['endDate'];
  	$electionDesc = $_POST['electionDesc'];
  	$dateModified = date("Y-m-d H:i:s");


  	$query = "UPDATE election SET election_name='{$electionName}', start_date=STR_TO_DATE('$startDate','%m/%d/%Y'), end_date=STR_TO_DATE('$endDate','%m/%d/%Y'), election_desc='{$electionDesc}'
  				, date_modified=STR_TO_DATE('$dateModified','%m/%d/%Y') WHERE election_id = $electionId";
  	$result = mysql_query($query);
  	if($result === FALSE)
  		echo "error";
  }


 ?>