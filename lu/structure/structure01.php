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
					<button type="submit" class="w3-button w3-green w3-small">Auto</button>
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
	
	public function __construct($statusInputNumber)
	{
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
				<label><b>Select input:</b></label>
				<div class="w3-container" style="padding:0px;padding-top:6px;">
					<div>
						<div id="Demo" class="w3-show w3-bar-block w3-card-4" style="width:100%;">';
						
							for($i=0;$i<count($statusInputNumber);$i++)
							{
								$this->content .= '<button type="submit" name="inputNumber" value="'.$statusInputNumber[$i].'" class="w3-button w3-white">'.$statusInputNumber[$i].'</button>';
							}	
												
						$this->content .= '</div>
					</div>
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
	
	// method declaration
	// none
	
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