<?php
	////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
	error_reporting(0);
	@ini_set(‘display_errors’, 0);
	
	require_once ('dbconnect.php');

	$record_type = $_POST['type'];
	$id =  $_POST['id'];
	
	if($record_type == 'election')
	{
		$query = "DELETE FROM election WHERE election_id = {$id}";
		echo $query;
		$result = mysql_query($query);
		if($result == FALSE)
			echo 'error';
	}
	else if($record_type == 'partylist')
	{

	}
	else if($record_type == 'student')
	{

	}
	else if($record_type == 'comsel')
	{
		
	}
	else
		echo "error";
?>