<?php
	////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
	error_reporting(0);
	@ini_set(‘display_errors’, 0);
	
	require_once ('dbconnect.php');

	$electionName = $_POST['electionName'];
	$startDate =  $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$electionDesc = $_POST['electionDesc'];

	$query = "Insert into election (election_name, start_date, end_date, election_desc)
				values ('$electionName',STR_TO_DATE('$startDate','%m/%d/%Y'),STR_TO_DATE('$endDate','%m/%d/%Y'),'$electionDesc')";
	$result = mysql_query($query);

	if($result == FALSE)
	{	
		echo "error";
	}
?>