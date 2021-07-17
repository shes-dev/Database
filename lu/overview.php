<?php
//SESSION START	
session_start();

//ERRORS DISPLAY
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//SESSION VAR OK
if($_SESSION['ok'] == 2)
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
				// Include the upload function
				include_once("upload/upload.php");
				// Get the result back so you can show results to user
				$errors = UploadCsvFile();
				//echo '$errors';
			}
		}
	}
}	

//PASSWORD INCORRECT
else
{
	//SLEEPING
	sleep(4);
		
	//REDIRECTING
	header ('location: http://www.commercials.com');
}

?>

<body class="w3-light-grey">

<?php	
	//header
	$headerDisplay = new headerClass();
	$headerDisplay->displayContent();
	
	//menu
	$menuDisplay = new menu();
	$menuDisplay->displayContent();
	
	if(!empty($_POST['doload'])) 
	{
		echo $errors[1];
	}
	
	//Sidebar
	$sidebarDisplay = new sidebar($con,'overview');
	$sidebarDisplay->displayContent();
	
	//dashboard
	$dashboardDisplay = new dashboard('Dashboard');
	$dashboardDisplay->displayContent();
 
	if(isset($errors))
	{
		if($errors[0] == 1)
		{
			include "csv/csv.php";
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

		<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-small">Upload</button>
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
		//dashboard
		$loadInputDisplay = new loadInput($statusInputNumber);
		$loadInputDisplay->displayContent();
	?>
  
  <div id="inputDiv" class="w3-container" style="text-align:left;direction:ltr;">
		<?php
			if(isset($errors))
			{	
				if($errors[0] == 1)
				{
					include "csv/csvOutput.php";
				}
			}
		?>
  </div>
  
  <div class="w3-container" style="text-align:right;direction:rtl;">
	<h5>מחסנית לפני עיבוד נתונים</h5>
	<div class="w3-responsive">
		<table id="table-01" class="w3-table-all" style="direction:rtl;text-align:right;">
		<tr>
			<th>מספר הזמנה - ואליגרה</th>
			<th>מספר הזמנה - ערוץ מכירה</th>
			<th>ערוץ מכירה</th>
			<th>תאריך הזמנה</th>
			<th>תאריך תשלום הזמנה</th>
			<th>מספר שורת הזמנה</th>
			<th>SKU</th>
			<th>תאור SKU</th>
			<th>תיאור מוצר בעברית</th>
			
			<th>הערות פריט</th>
			<th>הערות הזמנה</th>
			<th>מחיר יחידה במטבע העסקה</th>
			<th>מטבע</th>
			<th>שעח</th>
			<th>סהכ כולל מעמ</th>
			<th>שיעור מעמ</th>
			<th>סהכ לפני מעמ</th>
			<th>שם ומשפחה</th>
			<th>טלפון</th>
			<th>email</th>
			<th>כתובת משלוח מלאה</th>
			<th>שם לקוח מקבל</th>
			<th>רחוב</th>
			<th>רחוב 2</th>
			<th>עיר</th>
			<th>מדינה</th>
			<th>מיקוד</th>
			<th>ארץ</th>
			<th>אמצעי תשלום</th>
			<th>מספר אסמכתא</th>
			<th>סטטוס תשלום</th>
			<th>מספר חשבונית</th>
			<th>תאריך חשבונית</th>
			<th>מחסן יציאה</th>
			<th>משלח</th>
			<th>תאריך יציאת משלח</th>
			<th>הערות משרד</th>
			<th>ריק</th>
			<th>עמודת נוסחת ארץ לא לגעת</th>
		</tr>
		<tr>
			<td>21672</td>
			<td>1503436766</td>
			<td class="empty" id="channel-01">Other</td>
			<td>9/21/2019</td>
			<td>9/21/2019</td>
			<td>23424</td>
			<td>42294</td>
			<td class="empty" id="description-02"></td>
			<td class="empty" id="description-03"></td>
			<td>Gemstone: Blue Opal 12mm</td>			
			
			<td></td>
			<td>45.50</td>
			<td class="empty" id="currency-04"></td>
			<td class="empty" id="changeRate-05"></td>
			<td>160.25</td>
			<td class="empty" id="vat-06"></td>
			<td>160.25</td>
			<td>a1</td>
			<td>N/A</td>
			<td>k@hotmail.com</td>
			
			<td>" 2109 Oak Bliss Crescent oakville ON L6M 3K3 Canada"</td>
			<td>a1</td>
			<td>2109 Oak Bliss Crescent</td>
			<td></td>
			<td>oakville</td>
			<td>ON</td>
			<td>L6M 3K3</td>
			<td class="empty" id="country-07"></td>
			<td class="empty" id="paymentMethod-08"></td>
			<td></td>
			
			<td>PAID</td>
			<td>USD</td>
			<td>USD</td>
			<td class="empty" id="warehouse-09"></td>
			<td class="empty" id="delivery-10"></td>
			<td>USD</td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		</table>
	</div>
  </div>
  
  <div class="w3-container" style="text-align:right;direction:rtl;">
	<h5>עיבוד נתונים</h5>
  	<p><button class="w3-button w3-black w3-round-xxlarge" onclick="checkData()">לחצ/י</button></p>
  </div>
  
  <div id="table-02" class="w3-container" style="text-align:right;direction:rtl;">
	<h5>מחסנית אחרי עיבוד נתונים</h5>
	<div class="w3-responsive" id="div-result-01">
		<table class="w3-table-all" style="direction:rtl;text-align:right;">
		<tr>
			<th>מספר הזמנה - ואליגרה</th>
			<th>מספר הזמנה - ערוץ מכירה</th>
			<th>ערוץ מכירה</th>
			<th>תאריך הזמנה</th>
			<th>תאריך תשלום הזמנה</th>
			<th>מספר שורת הזמנה</th>
			<th>SKU</th>
			<th>תאור SKU</th>
			<th>תיאור מוצר בעברית</th>
			
			<th>הערות פריט</th>
			<th>הערות הזמנה</th>
			<th>מחיר יחידה במטבע העסקה</th>
			<th>מטבע</th>
			<th>שעח</th>
			<th>סהכ כולל מעמ</th>
			<th>שיעור מעמ</th>
			<th>סהכ לפני מעמ</th>
			<th>שם ומשפחה</th>
			<th>טלפון</th>
			<th>email</th>
			<th>כתובת משלוח מלאה</th>
			<th>שם לקוח מקבל</th>
			<th>רחוב</th>
			<th>רחוב 2</th>
			<th>עיר</th>
			<th>מדינה</th>
			<th>מיקוד</th>
			<th>ארץ</th>
			<th>אמצעי תשלום</th>
			<th>מספר אסמכתא</th>
			<th>סטטוס תשלום</th>
			<th>מספר חשבונית</th>
			<th>תאריך חשבונית</th>
			<th>מחסן יציאה</th>
			<th>משלח</th>
			<th>תאריך יציאת משלח</th>
			<th>הערות משרד</th>
			<th>ריק</th>
			<th>עמודת נוסחת ארץ לא לגעת</th>
		</tr>
		<tr>
			<td>21672</td>
			<td>1503436766</td>
			<td class="filled">Amazon</td>
			<td>9/21/2019</td>
			<td>9/21/2019</td>
			<td>23424</td>
			<td>42294</td>
			<td class="filled">Silver 925 Sterling Blue Opal 12mm Pendant</td>
			<td class="filled">תליון כסף 12 ממ בשיבוץ אופאל כחול + שרשרת</td>
			<td>Gemstone: Blue Opal 12mm</td>			
			
			<td></td>
			<td>45.50</td>
			<td class="filled">USD</td>
			<td class="filled">3.52</td>
			<td>160.25</td>
			<td class="filled">0%</td>
			<td>160.25</td>
			<td>a1</td>
			<td>N/A</td>
			<td>k@hotmail.com</td>
			
			<td>" 2109 Oak Bliss Crescent oakville ON L6M 3K3 Canada"</td>
			<td>a1</td>
			<td>2109 Oak Bliss Crescent</td>
			<td></td>
			<td>oakville</td>
			<td>ON</td>
			<td>L6M 3K3</td>
			<td class="filled">CA</td>
			<td class="filled">PayPal</td>
			<td></td>
			
			<td>PAID</td>
			<td>USD</td>
			<td>USD</td>
			<td class="filled">HAIFA</td>
			<td class="filled">ECOM</td>
			<td>USD</td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		</table>
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

</body>
</html>
