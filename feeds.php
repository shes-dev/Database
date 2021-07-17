<?php
//SESSION START	
session_start();

//ERRORS DISPLAY
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//SESSION VAR OK
if(isset($_SESSION['ok'])&&$_SESSION['ok'] == 2)
{
	include "structure/structure.php";
	//CONNECTING TO DB
	include "course/course_number.php";
	include "connect/connect.php";
				
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
			
			//include "table/02.php";
			
		}//PASSWORD CORRECT
		
		//PASSWORD INCORRECT
		else
		{
			//SLEEPING
			sleep(4);
			
			//REDIRECTING
			header ('location: http://www.commercials.com');
		}
	}


//	//header
	$headerDisplay = new headerClass();
	$headerDisplay->displayContent();
?>

<body class="w3-light-grey">

<?php	
	//menu
	$menuDisplay = new menu();
	$menuDisplay->displayContent();
	
	if(!empty($_POST['doload'])) 
	{
		echo $errors[1];
	}
	
	//Sidebar
	$sidebarDisplay = new sidebar($con,'feeds');
	$sidebarDisplay->displayContent();
	
	//dashboard
	$dashboardDisplay = new dashboard('Feeds');
	$dashboardDisplay->displayContent();

?>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
        <h5>Feeds</h5>
        <div class="w3-container">
		<table class="w3-table w3-striped w3-white">
          	<?php	
				include "status/getStatusAll.php";
				for($i=0;$i<count($status);$i++)
				{
					$text='<tr><td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>';
					$text.='<td>'.$status[$i].'</td><td><i>'.$statusTime[$i].'</i></td><td><i>'.$statusTimestamp[$i].'</i></td></tr>';
					echo $text;
					
				}	
			?>
		    </table><br>
		  <a href="overview.php"><button class="w3-button w3-dark-grey">Homepage  <i class="fa fa-arrow-right"></i></button></a>
       </div>
    </div>
  </div>
  <hr>
  
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
<?php
}//SESSION VAR OK

//SESSION VAR NOT OK
else
{
	include "alert/loginAlert.php";
}//SESSION VAR NOT OK
?>