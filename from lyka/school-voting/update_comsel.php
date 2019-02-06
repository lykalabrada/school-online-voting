<?php
	////UNCOMMENT FOR DEFENSE! or COMMENT FOR DEBUGGING! this will hide all the undefined error for optional fields
	error_reporting(0);
	@ini_set(‘display_errors’, 0);
	
	require_once ('dbconnect.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$electionId = $_POST['electionId'];
		$username = $_POST['username'];
		$fname =  $_POST['fname'];
	    $lname =  $_POST['lname'];
	    $mi =  $_POST['mi'];
		$course = $_POST['course'];
		$year = $_POST['year'];
		$role = $_POST['role'];
		$email = $_POST['email'];

		$query = "Update users set user_fname='$fname', user_lname='$lname', user_mi='$mi', email='$email' where username='$username'";
		$result = mysql_query($query);
		//echo $query;

		if($course!='')
		{
			$query2 = "Update student_list set student_fname='$fname', student_lname='$lname', student_mi='$mi', student_course='$course', student_year='$year', student_email='$email' where student_id='$username'";
			$result2 = mysql_query($query2);
		}

		$query3 = "Update voter_election set role='$role' where username = $username and election_id = $electionId";
    	$result3 = mysql_query($query3);

		/*if($result)
		{			
			header('Location: admin.php');
		}
		else
			return false;*/
	}
?>