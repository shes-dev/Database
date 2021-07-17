<?php
//SESSION START	
session_start();

//ERRORS DISPLAY
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//SESSION VAR OK
if(isset($_SESSION['ok'])&&$_SESSION['ok'] == 2)
{
	
	//CONNECTING TO DB
	include "course/course_number.php";
	include "connect/connect.php";
	
	include "structure/structure.php";
	
	//POST REQUEST WAS MADE TO REACH THE PAGE
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if($con)
		{
			// Process file upload 
			if(!empty($_POST['doload'])) 
			{
				include_once("upload/upload.php");
				
				// uploads csv file, returns success / error alert
				$errors = UploadCsvFile();
				
				//DEBUGGING
				//echo '$errors';
			}
		}
	}
}	
//PASSWORD INCORRECT
else
{
	include "alert/loginAlert.php";
}

	echo '<body class="w3-light-grey">';
	
	//header
	$headerDisplay = new headerClass();
	$headerDisplay->displayContent();
	
	//menu
	$menuDisplay = new menu();
	$menuDisplay->displayContent();
	
	//outputs alert on successful / error on csv upload
	if(!empty($_POST['doload'])) 
	{
		echo $errors[1];
	}
	
	//outputs alert if user hasn't loaded input before clicking on auto edit
	if(!empty($_POST['autoEditInput'])) 
	{
		if(!empty($_SESSION['autoEditInputAlert']))
		{
			echo $_SESSION['autoEditInputAlert'];
		}
	}
	
	//outputs alert if user hasn't loaded input before clicking on manual edit
	if(!empty($_POST['manualEditInput'])) 
	{
		if(!empty($_SESSION['manualEditInputAlert']))
		{
			echo $_SESSION['manualEditInputAlert'];
		}
	}
	
	//Sidebar
	$sidebarDisplay = new sidebar($con,'overview');
	$sidebarDisplay->displayContent();
	
	//dashboard
	$dashboardDisplay = new dashboard('Dashboard');
	$dashboardDisplay->displayContent();
 
	if(isset($errors))
	{
		//csv upload successful
		if($errors[0] == 1)
		{
			//inserts csv data to lines array
			include "csv/csv.php";
			
			//inserts lines array data to db, line by line
			include "csv/insertToTables.php";
		}
	}
?>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <img src="/w3images/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>
				<?php	
					include "status/getStatus.php";
					echo $status[0];
				?>
			</td>
            <td><i>
				<?php	
					echo $statusTime[0];
				?>
			</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>
				<?php	
					echo $status[1];
				?>
			</td>
            <td><i>
				<?php	
					echo $statusTime[1];
				?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>
				<?php	
					echo $status[2];
				?>
			</td>
            <td><i>
				<?php	
					echo $statusTime[2];
				?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>
				<?php	
					echo $status[3];
				?>
			</td>
            <td><i>
				<?php	
					echo $statusTime[3];
				?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>
				<?php	
					echo $status[4];
				?>
			</td>
            <td><i><?php	
					echo $statusTime[4];
				?></i></td>
          </tr>
          </table><br>
		  <a href="feeds.php"><button class="w3-button w3-dark-grey">More Feeds  <i class="fa fa-arrow-right"></i></button></a>
      </div>
    </div>
  </div>
  <hr>
  
	<div class="w3-container">
		<h5>UPLOAD CSV FILE</h5>

		<button id="load-input" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-small">Upload</button>
	</div>
  
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="w3images/avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>
		
		<form class="w3-container" action="" method="post" enctype="multipart/form-data">
			<div class="w3-section">
				<label><b>CSV file:</b></label>
				<input class="w3-input w3-border w3-margin-bottom" type="file" name="fileToUpload" id="fileToUpload">
				<input type="hidden" name="doload" value="doload">
				<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit">Upload</button>
			</div>
		</form>
		
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small">Need <a href="#">help?</a></span>
      </div>

    </div>
  </div>
  
	<?php 
		//load input
		$loadInputDisplay = new loadInput($statusInputNumber,$con);
		$loadInputDisplay->displayContent();
	?>
  
  <div id="inputDiv" class="w3-container" style="text-align:left;direction:ltr;">
		<?php
			if(isset($errors))
			{	
				if($errors[0] == 1)
				{
					//checking csv file
					//include "csv/csvOutput.php";
				}
			}
		?>
  </div>
  
  <div class="w3-container">
	<?php
		if(!empty($_POST['inputLoad'])) 
		{	
			if(isset($_POST['inputNumber']))
			{
				$_SESSION['inputNumber']=$_POST['inputNumber'];
			}
			
			//echo '<h5>INPUT '.$_SESSION['inputNumber'].' BEFORE AUTOMATION</h5>';
			echo '<h5>LATEST INPUT '.$_SESSION['inputNumber'].'</h5>';
		}
		else
		{
			echo '<h5>INPUT BEFORE AUTOMATION</h5>';
		}
	?>
	<div class="w3-responsive">
		<table id="table-01" class="w3-table-all">
			<?php
				$table_headers_display = new table_headers();
				$table_headers_display->displayContent();
				
				if(!empty($_POST['inputLoad'])) 
				{
					//gets data from database according to input number and inserts into allData array
					include "csv/getDataFromTables.php";
					
					//outputs allData array to INPUT BEFORE AUTOMATION table as tr
					include "csv/loadDataAsTr.php";
				}
			?>
		</table>
	</div>
  </div>
  
	<?php 
		//auto edit input
		$autoEditInputDisplay = new autoEditInput();
		$autoEditInputDisplay->displayContent();
	?>
	
	<div class="w3-container">
	<?php
		function getExchangeRate() {
			// create curl resource
			$ch = curl_init();
	
			// set url
			curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?ei=9cv_XaTCBsqD8gLo3rr4DQ&q=1+dolar+to+nis&oq=1+dolar+to+nis&gs_l=psy-ab.3..0i10j0i22i10i30l4j0i22i30l5.2475.9534..9710...0.4..0.968.2901.0j11j1j6-1......0....1..gws-wiz.......0i71j0i131j0j0i67j0i3.NQGoCNj-9Hc&ved=0ahUKEwjkkJOvhsrmAhXKgVwKHWivDt8Q4dUDCAs&uact=5");
	
			//return the transfer as a string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
			// $output contains the output string
			$output = curl_exec($ch);
	
			// close curl resource to free up system resources
			curl_close($ch);  
	
			//gets initial position
			$a = strpos($output, 'Israeli New Shekel');
			
			//goes back 5 chars
			$a = $a-5;
			
			//more substr
			$b = substr($output, $a); 
			$c = substr($b, 0, 5); 
			
			//returns exchange rate
			return $c;
		}
				
		if(!empty($_POST['autoEditInput']) && empty($_SESSION['autoEditInputAlert'])) 
		{	
			//DEBUGGING
			//var_dump($_SESSION['currentUpdate']);
			
			//displays AUTO button
			if(isset($_SESSION['currentUpdate']))
			{
				$exchangeRate = getExchangeRate();
					
				echo '<h5 style="margin-top:0px;">CLICK AUTO FOR INPUT '.$_SESSION['inputNumber'].' UPDATE '.$_SESSION['currentUpdate'].' AFTER AUTOMATION</h5>';
				echo '<button onclick="outputJsArrayToTrAuto(javascript_array,'.$exchangeRate.')" class="w3-button w3-green w3-small w3-margin-bottom">Auto</button>';
			}
			else
			{
				echo '<h5>INPUT '.$_SESSION['inputNumber'].' AFTER AUTOMATION</h5>';
			}
		}
		else
		{
			echo '';
		}
	?>
	<div class="w3-responsive">
		<table class="w3-table-all" id="auto-table">
			<?php
				$table_headers_display = new table_headers();
				$table_headers_display->displayContent();
				
				if(!empty($_POST['autoEditInput']) && empty($_SESSION['autoEditInputAlert'])) 
				{
					//include "csv/getDataFromTables.php";
					//include "csv/loadDataAsTr.php";					
				}
			?>
		</table>
	</div>
  </div>
  
  <?php 
		//manual edit input
		$manualEditInputDisplay = new manualEditInput();
		$manualEditInputDisplay->displayContent();
	?>
	
	<div class="w3-container">
	<?php
		if(!empty($_POST['manualEditInput']) && empty($_SESSION['manualEditInputAlert'])) 
		{	
			if(isset($_SESSION['currentUpdate'])&&!empty($_SESSION['currentUpdate']))
			{
				echo '<h5>INPUT '.$_SESSION['inputNumber'].' UPDATE '.$_SESSION['currentUpdate'].' AFTER MANUAL EDITING</h5>';
			}
			else
			{
				echo '<h5>INPUT '.$_SESSION['inputNumber'].' AFTER MANUAL EDITING</h5>';
			}
		}
		else
		{
			echo '';
		}
	?>
	<div class="w3-responsive">
		<form class="w3-container" action="overview.php#after-menual" method="post" enctype="multipart/form-data" style="padding-left:0px;">
			<table class="w3-table-all" id="manual-table">
			
				<?php
					
					$table_headers_display = new table_headers(1);
					$table_headers_display->displayContent();
					
					if(!empty($_POST['manualEditInput']) && empty($_SESSION['manualEditInputAlert'])) 
					{
						//var_dump($_POST);
						//var_dump($_SESSION);
						
						if(isset($_POST['saveRow'])) 
						{
							include "csv/insertRowToTables.php";
							include "csv/getUpdatedRowsFromTables.php";
							include "csv/getDataFromTables.php";
							
							include "csv/getNewRowsFromTables.php";
							include "csv/compareDataFromUpdates.php";
							include "csv/insertUpdatedDataToTables.php";
							
							//echo '<h1>getUpdatedRowsFromTables:</h1>';
							//echo '<pre>';
							//var_dump($allUpdatedData);
							//echo '</pre>';
							//echo '<br>';
						}
						
							include "csv/getDataFromTables.php";
														
						for($m=0;$m<$numOfRows;$m++)
						{
							if(isset($_POST['manualEditInput'])&&isset($_POST['editRow'])&&$_POST['editRow']==$m)
							{
								$editedRow=1;
								echo '<tr class="w3-yellow">';
							}
							else
							{
								$editedRow=0;
								echo '<tr>';
							}
							//edit button
							echo '<td>
								
									<div class="w3-container" style="padding:0px;padding-top:6px;">
										<button type="submit" name="editRow" value="'.$m.'" class="w3-button w3-green w3-small" style="width:100%;">Edit</button>';
										if(isset($_POST['manualEditInput'])&&isset($_POST['editRow'])&&$_POST['editRow']==$m)
										{
											echo '<button type="submit" name="saveRow" value="'.$m.'" class="w3-button w3-purple w3-small" style="margin-top:6px;width:100%;">Save</button>';
											echo '<div name="addRow" onclick="addRowFunc(this)" value="'.$m.'" class="w3-button w3-red w3-small" style="margin-top:6px;width:100%;color:white;">Add</div>';
										}
										echo '<input type="hidden" name="manualEditInput" value="manualEditInput">
										<input type="hidden" name="autoEditInput" value="autoEditInput">
										<input type="hidden" name="inputLoad" value="inputLoad">
									</div>';
								
							echo'</td>';
							
							
							//or_table
							for($i=0;$i<count($or[$m]);$i++)
							{
								if($editedRow)
								{
									echo '<td><input type="text" placeholder="'.$or[$m][$i].'" name="or_'.$m.'_'.$i.'" value="'.$or[$m][$i].'"></td>';
								}
								else
								{
									echo '<td>'.$or[$m][$i].'</td>';
								}
							}
							
							//itm_table
							for($i=0;$i<count($itm[$m]);$i++)
							{
								if($editedRow)
								{
									if($i==5)
									{
										echo '<td><textarea cols="40" rows="5" placeholder="'.$itm[$m][$i].'" name="itm_'.$m.'_'.$i.'" value="'.$itm[$m][$i].'"></textarea></td>';
									}
									else
									{
										echo '<td><input type="text" placeholder="'.$itm[$m][$i].'" name="itm_'.$m.'_'.$i.'" value="'.$itm[$m][$i].'"></td>';
									}
								}
								else
								{
									echo '<td>'.$itm[$m][$i].'</td>';
								}
							}
							
							//pr_table
							for($i=0;$i<count($pr[$m]);$i++)
							{
								if($editedRow)
								{
									echo '<td><input type="text" placeholder="'.$pr[$m][$i].'" name="pr_'.$m.'_'.$i.'" value="'.$pr[$m][$i].'"></td>';
								}
								else
								{
									echo '<td>'.$pr[$m][$i].'</td>';
								}
							}
							
							//z_table
							for($i=0;$i<count($z[$m]);$i++)
							{
								if($editedRow)
								{
									echo '<td><input type="text" placeholder="'.$z[$m][$i].'" name="z_'.$m.'_'.$i.'" value="'.$z[$m][$i].'"></td>';
								}
								else
								{
									echo '<td>'.$z[$m][$i].'</td>';
								}
							}
							
							//shp_table
							for($i=0;$i<count($shp[$m]);$i++)
							{
								if($editedRow)
								{
									if($i==4)
									{
										echo '<td><textarea cols="40" rows="5" placeholder="'.$shp[$m][$i].'" name="shp_'.$m.'_'.$i.'" value="'.$shp[$m][$i].'"></textarea></td>';
									}
									else
									{
										echo '<td><input type="text" placeholder="'.$shp[$m][$i].'" name="shp_'.$m.'_'.$i.'" value="'.$shp[$m][$i].'"></td>';
									}
								}
								else
								{
									echo '<td>'.$shp[$m][$i].'</td>';
								}
							}
							
							//cs_table
							for($i=0;$i<count($cs[$m]);$i++)
							{
								if($editedRow)
								{
									if($i==2||$i==5)
									{
										echo '<td><textarea cols="40" rows="5" placeholder="'.$cs[$m][$i].'" name="cs_'.$m.'_'.$i.'" value="'.$cs[$m][$i].'"></textarea></td>';
									}
									else
									{
										echo '<td><input type="text" placeholder="'.$cs[$m][$i].'" name="cs_'.$m.'_'.$i.'" value="'.$cs[$m][$i].'"></td>';
									}
								}
								else
								{
									echo '<td>'.$cs[$m][$i].'</td>';
								}
							}
							
							//pmt_table
							for($i=0;$i<count($pmt[$m]);$i++)
							{
								if($editedRow)
								{
									echo '<td><input type="text" placeholder="'.$pmt[$m][$i].'" name="pmt_'.$m.'_'.$i.'" value="'.$pmt[$m][$i].'"></td>';
								}
								else
								{
									echo '<td>'.$pmt[$m][$i].'</td>';
								}
							}
							
							//lg_table
							for($i=0;$i<count($lg[$m]);$i++)
							{
								if($editedRow)
								{
									echo '<td><input type="text" placeholder="'.$lg[$m][$i].'" name="lg_'.$m.'_'.$i.'" value="'.$lg[$m][$i].'"></td>';
								}
								else
								{
									echo '<td>'.$lg[$m][$i].'</td>';
								}
							}
							
							//bb_table
							for($i=0;$i<count($bb[$m]);$i++)
							{
								if($editedRow)
								{
									echo '<td><input type="text" placeholder="'.$bb[$m][$i].'" name="bb_'.$m.'_'.$i.'" value="'.$bb[$m][$i].'"></td>';
								}
								else
								{
									echo '<td>'.$bb[$m][$i].'</td>';
								}
							}
							echo '</tr>';
						}
					}
				?>
			</table>
		</form>
	</div>
  </div>
    
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Countries</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
	// Get the Sidebar
	var mySidebar = document.getElementById("mySidebar");
	
	// Get the DIV with overlay effect
	var overlayBg = document.getElementById("myOverlay");
	
	// Toggle between showing and hiding the sidebar, and add overlay effect
	function w3_open() {
	if (mySidebar.style.display === 'block') {
		mySidebar.style.display = 'none';
		overlayBg.style.display = "none";
	} else {
		mySidebar.style.display = 'block';
		overlayBg.style.display = "block";
	}
	}
	
	// Close the sidebar with the close button
	function w3_close() {
	mySidebar.style.display = "none";
	overlayBg.style.display = "none";
	}
</script>

<?php	
	if(!empty($_POST['inputLoad'])) {
		include "csv/phpArrayToJsArray.php";
	}
?>

</body>
</html>
