<?php
if(!isset($_SESSION['ok']))
{
	//SLEEPING
	sleep(4);
		
	//REDIRECTING
	header ('location: http://www.commercials.com');
}

//ERROR DISPLAY
//	error_reporting(E_ALL);
//	ini_set('display_errors', 'On');

//VARS - NONE
	
//INCLUDES - NONE
	
//FUNCTIONS
	
	//OPENING FAR TEXT FILE
	// - GETS USER CODE AND VAR OF NO USE
	// - OPENS FAR FILE AND COPIES DB DETAILS TO ARRAY
	// - RETURNS DB DETAILS ARRAY
	
	function getfile($new_path,$p,$course_number)
	{
		//GETTING PATH TO FILE
		$t=$new_path;
		//OPENING FILE//OUTPUT 00
		$myfile = fopen("../../../ocartdata/storage/vendor/react/promise/tests/PromiseTest/".$course_number."/$t.txt", "r") or die("Unable to open file!");
		//GETTING FILE CONTENT//OUTPUT 01
		$r=file_get_contents("../../../ocartdata/storage/vendor/react/promise/tests/PromiseTest/".$course_number."/$t.txt");
		//CLOSING FILE
		fclose($myfile);
		//SPLITTING BY SPACES
		$p = explode("\n", $r);
		//RETURN DB DETAILS ARRAY
		return $p;
	}
	
	//GET DB DETAILS
	$new_path = 'test_01';
	$db_details = getfile($new_path,12,$course_number);
	
	//CONNECTING//DATABASE//DATA

	$host = $db_details[0];
	$username = $db_details[1];
	$password = $db_details[2];
	$db = $db_details[3];

		
	//CREATING CONNECTION
	$con = mysqli_connect($host, $username, $password,$db);
	
	//CHECKING CONNECTION
	if($con)
	{
		//echo '<i class="fa fa-check-square-o" style="font-size:24px;color:purple;"></i>';
		//echo 'connection ok';
	}
	else
	{
		die('Could not connect: ' . mysqli_error($con));
	}
		
	//SELECTING DATABASE
	mysqli_select_db($con, $db_details[3]); 
	
	//ENABLING HEBREW
	mysqli_query($con,"SET character_set_client=utf8mb4");
	mysqli_query($con,"SET character_set_connection=utf8mb4");
	mysqli_query($con,"SET character_set_database=utf8mb4");
	mysqli_query($con,"SET character_set_results=utf8mb4");
	mysqli_query($con,"SET character_set_server=utf8mb4");
	
	//SETTING TIME	
	$sql_Time = "SET time_zone = '+02:00';";
	$query = mysqli_query($con,$sql_Time);
	
	//SANITIZING
	//$U_name = $con->real_escape_string($_POST['user_name']);
	//$P_ass = md5($con->real_escape_string($_POST['pass_word']));
	//$_SESSION['u_n']=$U_name;
	$ip_address=$_SERVER['REMOTE_ADDR'];
?>
