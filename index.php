<?php
	//SESSION START	
	session_start();
		
	//ERRORS DISPLAY
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	//SSL
	if($_SERVER["HTTPS"] != "on")
	{
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit();
	}
	
	//structure
	include "structure/structure.php";
	
	//POST REQUEST WAS MADE TO REACH THE PAGE
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(strtolower($_POST['usrname']) == 'sharon' && $_POST['psw'] == 'database1234')
		{
			$_SESSION['ok'] = 2;
			
			header ('location: overview.php');
			
		}//PASSWORD CORRECT
		else
		{
			sleep(4);
			
			header ('location: http://www.commercials.com');
		}//PASSWORD NOT CORRECT
	}

	//header
	$headerDisplay = new headerClass('welcome');
	$headerDisplay->displayContent();
?>	


<body>
<div class="bg">
	<div class="w3-container">
		<div class="centered" style="text-align:center;">
			<h2 style="color:white;">Welcome</h2>
			<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>
		</div>		
			
			<div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
		
			<div class="w3-center"><br>
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
				<img src="w3images/avatar2.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
			</div>
	
			<form class="w3-container" action="" method="post" enctype="multipart/form-data">
				<div class="w3-section">
				<label><b>Username</b></label>
				<input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
				<label><b>Password</b></label>
				<input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required>
				<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
				<!--<input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me -->
				</div>
			</form>
		
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
			</div>
	
			</div>
		</div>
	</div>
</div>
</body>
</html>
