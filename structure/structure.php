<?php

class manualEditInput
{
	// property declaration
    public $content;
    public $text;
	
	// method declaration
	// none
	
	public function __construct($manualEditInput = null)
	{
		$this->content = '
		<div class="w3-container" id="after-menual">
			<form class="w3-container" action="overview.php#after-menual" method="post" enctype="multipart/form-data" style="padding-left:0px;">
				<div class="w3-container" style="padding:0px;padding-top:6px;">
					<h5>MANUAL EDIT INPUT</h5>
					<button type="submit" class="w3-button w3-green w3-small">Edit</button>
				</div>
				<input type="hidden" name="manualEditInput" value="manualEditInput">';
				if(!empty($_SESSION['inputNumber']))
				{
					$this->content .='<input type="hidden" name="inputLoad" value="inputLoad">
									  <input type="hidden" name="autoEditInput" value="autoEditInput">
									  <input type="hidden" name="inputNumber" value="'.$_SESSION['inputNumber'].'">
					';
					$_SESSION['manualEditInputAlert']='';
				}
				else
				{
					$_SESSION['manualEditInputAlert']='
					<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
					<span class="closebtn" onclick="closeButton()">&times;</span> 
					<h5>Please select input to load first.</h5>
					</div>';
				}
			$this->content .='</form>
		</div>
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class autoEditInput
{
	// property declaration
    public $content;
    public $text;
	
	// method declaration
	// none
	
	public function __construct($autoEditInput = null)
	{
		$this->content = '
		<div class="w3-container" id="after-automation">
			<form class="w3-container" action="overview.php#after-automation" method="post" enctype="multipart/form-data" style="padding-left:0px;">
				<div class="w3-container" style="padding:0px;padding-top:6px;">
					<h5>AUTO EDIT INPUT</h5>
					<button type="submit" class="w3-button w3-green w3-small">Edit</button>
				</div>
				<input type="hidden" name="autoEditInput" value="autoEditInput">';
				if(!empty($_SESSION['inputNumber']))
				{
					$this->content .='<input type="hidden" name="inputLoad" value="inputLoad">
									  <input type="hidden" name="inputNumber" value="'.$_SESSION['inputNumber'].'">
					';
					$_SESSION['autoEditInputAlert']='';
				}
				else
				{
					$_SESSION['autoEditInputAlert']='
					<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
					<span class="closebtn" onclick="closeButton()">&times;</span> 
					<h5>Please select input to load first.</h5>
					</div>';
				}
			$this->content .='</form>
		</div>
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class loadInput
{
	// property declaration
    public $content;
    public $text;
	
	// method declaration
	// none
	
	public function __construct($statusInputNumber,$con)
	{
		$_SESSION['update']=0;
		$this->content = '
		<div class="w3-container">
				<h5>LOAD INPUT</h5>
		
				<button onclick="document.getElementById(\'id02\').style.display=\'block\'" class="w3-button w3-green w3-small">Load</button>
			</div>
		
		<div id="id02" class="w3-modal">
			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
		
			<div class="w3-center"><br>
				<span onclick="document.getElementById(\'id02\').style.display=\'none\'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
				<img src="w3images/avatar3.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
			</div>
				
		<form class="w3-container" action="overview.php#load-input" method="post" enctype="multipart/form-data">
			<div class="w3-section">
				<label><b>Select original input:</b></label>
				<div class="w3-container" style="padding:0px;padding-top:6px;">
					<div>
						<div id="Demo" class="w3-show w3-bar-block w3-card-4" style="width:100%;">';
						
							for($i=0;$i<count($statusInputNumber);$i++)
							{
								$this->content .= '<button type="submit" name="inputNumber" value="'.$statusInputNumber[$i].'" class="w3-button w3-white">'.$statusInputNumber[$i].'</button>';
							}	
							
							include "csv/getInputAndUpdatesDataFromTables.php";
						$this->content .= '</div>
					</div>
				</div>
				
				<h2>My Inputs</h2>

					<input type="text" id="myInput" onkeyup="mySearchInputTableFunction()" placeholder="Search for names.." title="Type in a name">
					<div class="w3-responsive" style="max-height: calc(100vh - 210px);overflow-y: auto;">
						<table id="myTable" class="w3-table-all">';
						if(isset($updates)&&isset($fullUpdates))
						{
							//if(isset($updates['inputNumber']))
							//{	
							//	for($i=0;$i<count($updates['inputNumber']);$i++)
							//	{
							//		$this->content.='<tr>
							//			<td>Input '.$updates['inputNumber'][$i].'</td>
							//			<td>update '.$updates['updateNumber'][$i].'</td>
							//			<td>update '.$updates['input1'][$i].'</td>
							//			<td><button type="submit" name="inputNumber" value="'.$updates['inputNumber'][$i].'" class="w3-button w3-green w3-small">Load</button></td>
							//			</tr>';
							//	}
							//}
							for($i=0;$i<count($fullUpdates['inputNumber']);$i++)
							{
								if(!empty($fullUpdates['fileName'][$i]))
								{
									$this->content.='<tr>
									<td>Input '.$fullUpdates['inputNumber'][$i].'</td>
									<td>'.$fullUpdates['fileName'][$i].'</td>
									<td>'.$fullUpdates['timestamp'][$i].'</td>
									<td><button type="submit" name="inputNumber" value="'.$fullUpdates['inputNumber'][$i].'" class="w3-button w3-green w3-small">Load</button></td>
									</tr>';
								}
							}
						}
						$this->content.='</table>
					</div>
				<input type="hidden" name="inputLoad" value="inputLoad">
			</div>
		</form>
		
		<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
			<button onclick="document.getElementById(\'id02\').style.display=\'none\'" type="button" class="w3-button w3-red">Cancel</button>
			<span class="w3-right w3-padding w3-hide-small">Need <a href="#">help?</a></span>
		</div>

		</div>
		</div>';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class table_headers
{
	// property declaration
    public $content;
    public $manual_edit;
    
	
	// method declaration
	// none
	
	public function __construct($manual_edit = 0)
	{
		$this->content = '
		
			<tr>';
				if($manual_edit) {
					$this->content .= '<th>Edit</th>';
				}
				
				$this->content .= '<th>Order Number</th>
				<th>Order Marketplace ID</th>
				<th>Order Channel</th>
				<th>Order Account</th>
				<th>Order Date</th>
				<th>Order Paid Date</th>
				<th>Order Time</th>
				<th>Order Comments</th>
				<th>Order Item Line #</th>
				
				<th>Valigara Product ID</th>
				<th>Order Item SKU</th>
				<th>Model Code</th>
				<th>Metal 1 Name</th>
				<th>Gemstone 1 Commercial title</th>
				<th>Product title</th>
				<th>Order Item Variation</th>
				<th>Order Item Qty.</th>
				<th>Order Item Comment</th>
				<th>Set Finish</th>
				
				<th>Order Total incl Taxes</th>
				<th>Order Final price</th>
				<th>Order Shipping cost</th>
				<th>Order Item Buying Price</th>
				<th>Order Item Market Price</th>
				<th>Order Discount</th>
				<th>Order Currency</th>
				
				<th>Exchange rate</th>
				<th>Total including vat</th>
				<th>vat</th>
				<th>Total excluding vat</th>
				
				<th>Order Shipping Full Name</th>
				<th>Order Shipping Country</th>
				<th>Order Shipping State</th>
				<th>Order Shipping City</th>
				<th>Order Shipping Address</th>
				<th>Order Shipping First Name</th>
				<th>Order Shipping Last Name</th>
				<th>Order Shipping Street</th>
				<th>Order Shipping Street 2</th>
				<th>Order Shipping Phone</th>
				<th>Order Shipping Zip Code</th>
				
				<th>Order Name</th>
				<th>Client Name</th>
				<th>Client Email</th>
				<th>Client Phone</th>
				<th>Client Country</th>
				<th>Client Address</th>
				<th>Client Comments</th>
				
				<th>Order Payment Method</th>
				<th>Order Transaction ID</th>
				<th>Order Invoices Number(s)</th>
				<th>Invoice date</th>
				
				<th>Order Due Date</th>
				<th>Order Status</th>
				<th>Order Shipping Type</th>
				<th>Order Tracking Number</th>
				<th>Shipping Policy for Adita Ebay</th>
				<th>Shipping Profiles for Adita Etsy Gold</th>
				<th>Shipping Profiles for Adita Etsy Silver</th>
				
				<th>Exit</th>
				<th>Currier</th>
				<th>Delivery date 01</th>
				<th>Delivery date 02</th>
			</tr>
			<tr>';
				
				if($manual_edit) {
					$this->content .= '<td class="or"></td>';
				};
				
				$this->content .= '<td class="or">or1</td>
				<td class="or">or2</td>
				<td class="or" id="channel-01">or3</td>
				<td class="or">or4</td>
				<td class="or">or5</td>
				<td class="or">or6</td>
				<td class="or">or7</td>
				<td class="or" id="description-02">or8</td>
				<td class="or" id="description-03">or9</td>
					
				<td class="itm">itm1</td>
				<td class="itm">itm2</td>
				<td class="itm" id="currency-04">itm3</td>
				<td class="itm" id="changeRate-05">itm4</td>
				<td class="itm">itm5</td>
				<td class="itm" id="vat-06">itm6</td>
				<td class="itm">itm7</td>
				<td class="itm">itm8</td>
				<td class="itm">itm9</td>
				<td class="itm">itm10</td>
				
				<td class="pr">pr1</td>
				<td class="pr">pr2</td>
				<td class="pr">pr3</td>
				<td class="pr">pr4</td>
				<td class="pr">pr5</td>
				<td class="pr">pr6</td>
				<td class="pr">pr7</td>
				
				<td class="z">z1</td>
				<td class="z">z2</td>
				<td class="z">z3</td>
				<td class="z">z4</td>
								
				<td class="shp">shp1</td>
				<td class="shp">shp2</td>
				<td class="shp">shp3</td>
				<td class="shp">shp4</td>
				<td class="shp">shp5</td>
				<td class="shp">shp6</td>
				<td class="shp">shp7</td>
				<td class="shp">shp8</td>
				<td class="shp">shp9</td>
				<td class="shp">shp10</td>
				<td class="shp">shp11</td>
				
				<td class="cs">cs1</td>
				<td class="cs">cs2</td>
				<td class="cs">cs3</td>
				<td class="cs">cs4</td>
				<td class="cs">cs5</td>
				<td class="cs">cs6</td>
				<td class="cs">cs7</td>
				
				<td class="pmt">pmt1</td>
				<td class="pmt">pmt2</td>
				<td class="pmt">pmt3</td>
				<td class="pmt">pmt4</td>
				
				<td class="lg">lg1</td>
				<td class="lg">lg2</td>
				<td class="lg">lg3</td>
				<td class="lg">lg4</td>
				<td class="lg">lg5</td>
				<td class="lg">lg6</td>
				<td class="lg">lg7</td>
				
				<td class="bb">bb1</td>
				<td class="bb">bb2</td>
				<td class="bb">bb3</td>
				<td class="bb">bb4</td>
			</tr>

		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class dashboard
{
	// property declaration
    public $content;
    public $text;
	
	// method declaration
	// none
	
	public function __construct($text)
	{
		$this->content = '
		
			<!-- !PAGE CONTENT! -->
			<div class="w3-main" style="/*margin-left:300px;*/margin-top:43px;">
			
			<!-- Header -->
			<header class="w3-container" style="padding-top:22px">
				<h5><b><i class="fa fa-dashboard"></i> My '.$text.'</b></h5>
			</header>
			
			<div class="w3-row-padding w3-margin-bottom">
				<div class="w3-quarter">
				<div class="w3-container w3-purple w3-padding-16">
					<div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
					<div class="w3-right">
					<h3>52</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Messages</h4>
				</div>
				</div>
				<div class="w3-quarter">
				<div class="w3-container w3-blue w3-padding-16">
					<div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
					<div class="w3-right">
					<h3>99</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Views</h4>
				</div>
				</div>
				<div class="w3-quarter">
				<div class="w3-container w3-teal w3-padding-16">
					<div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
					<div class="w3-right">
					<h3>23</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Shares</h4>
				</div>
				</div>
				<div class="w3-quarter">
				<div class="w3-container w3-orange w3-text-white w3-padding-16">
					<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
					<div class="w3-right">
					<h3>50</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Users</h4>
				</div>
				</div>
			</div>

		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class headerClass
{
	// property declaration
    public $content;
	
	// constructor declaration
	public function __construct($page = null)
	{
		$this->content = '
			<!DOCTYPE html>
			<html>
			<head>
			
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148710954-1"></script>
			<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag(\'js\', new Date());
			
			gtag(\'config\', \'UA-148710954-1\');
			</script>
			<script src="js/jsFile.js"></script>
			
			<!-- FAVICON --><!-- OUTPUT 01_NOT NUMBERED -->
			<link rel="icon" type="image/png" href="css/favicon.ico">
			
			<!-- APPLE TOUCH ICON --><!-- OUTPUT 02 -->
			<link rel="apple-touch-icon" sizes="16x16" href="css/favicon-16x16.png" />
			<link rel="apple-touch-icon" sizes="32x32" href="css/favicon-32x32.png" />
			<link rel="apple-touch-icon" sizes="192x192" href="css/android-chrome-192x192.png" />
			<link rel="apple-touch-icon" sizes="512x512" href="css/android-chrome-512x512.png" />
			<link rel="apple-touch-icon" href="css/apple-touch-icon.png" />
			
			<title>Database</title>
			<meta name="description" content="אתר לדוגמה.">
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/w3css.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
			';
			if($page == 'welcome')
			{
				$this->content .='
				<style>
					body, html {
					height: 100%;
					margin: 0;
					}
					
					.bg {
					/* The image used */
					background-image: url("w3images/photographer.jpg");
					
					/* Full height */
					height: 100%; 
					
					/* Center and scale the image nicely */
					background-position: center;
					background-repeat: no-repeat;
					background-size: cover;
					}
					
					/* Centered text */
					.centered {
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
					}
				</style>';
				}
			$this->content .='
			</head>
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class menu
{
	// property declaration
    public $content;
	
	// method declaration
	// none
	
	public function __construct()
	{
		$this->content = '
			<!-- Top container -->
			<div id="topMenu" class="w3-bar w3-top w3-black w3-large" style="z-index:4">
			<button class="w3-bar-item w3-button w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
			<span class="w3-bar-item w3-right">Logo</span>
			</div>
			
			<!-- Overlay effect when opening sidebar on small screens -->
			<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

class sidebar
{
	// property declaration
    public $content;
    public $current;
	
	// method declaration
	// none
	
	public function __construct($con = null,$current = null)
	{
		$this->content = '
		<!-- Sidebar/menu -->
		<nav class="w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;position:fixed!important;" id="mySidebar"><br>
		<div class="w3-container w3-row">
			<div class="w3-col s4">
				<img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
			</div>
			<div class="w3-col s8 w3-bar">
			<span>Welcome, <strong>Sharon</strong></span><br>
			<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
			<a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
			<a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
			</div>
		</div>
		<hr>
		<div class="w3-container">
		<h5>Dashboard</h5>
		</div>
		<div class="w3-bar-block">
		<a href="#" class="w3-bar-item w3-button w3-padding-16 w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>';
		if($current == 'overview')
		{
			$this->content .='<a href="overview.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>';
		}
		else
		{
			$this->content .='<a href="overview.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Overview</a>';
		}
		if($current == 'feeds')
		{
			$this->content .='<a href="feeds.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-feed fa-fw"></i>  Feeds</a>';
		}
		else
		{
			$this->content .='<a href="feeds.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-feed fa-fw"></i>  Feeds</a>';
		}
			
		$this->content .='
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
		<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>';
		if($con)
			{
				$this->content.='<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-database fa-fw"></i>  Connection OK</a><br><br>';
			}
			
		$this->content.='</div>
		</nav>
		';
	}
	
	// method declaration
    public function displayContent() 
	{
        echo $this->content;
    }
}

?>