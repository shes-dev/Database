<?php
	
	//load latest update of input
	if(isset($_SESSION['update'])&&!empty($_SESSION['update']))
	{
		$originalInputNumber=$_SESSION['inputNumber'];
		
		//get latest update inputNumber
		$sql = "SELECT inputNumber,updateNumber FROM input_table WHERE updateToInput = '$originalInputNumber' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		
		while($row = $query->fetch_assoc()) 
		{
			$requestedInputNumber = $row['inputNumber'];
			$requestedInputUpdate = $row['updateNumber'];
			$_SESSION['currentUpdate']=$requestedInputUpdate;
		}
	}
	else
	{
		$requestedInputNumber = $_SESSION['inputNumber'];
	}
	
	//or_table
	$sql = "SELECT * FROM or_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$or=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
	
		$or[$i][0]=$row['or1'];
		$or[$i][1]=$row['or2'];
		$or[$i][2]=$row['or3'];
		$or[$i][3]=$row['or4'];
		$or[$i][4]=$row['or5'];
		$or[$i][5]=$row['or6'];
		$or[$i][6]=$row['or7'];
		$or[$i][7]=$row['or8'];
		$or[$i][8]=$row['or9'];
		
		$i++;
	}
	
	//itm_table
	$sql = "SELECT * FROM itm_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$itm=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$itm[$i][0]=$row['itm1'];
		$itm[$i][1]=$row['itm2'];
		$itm[$i][2]=$row['itm3'];
		$itm[$i][3]=$row['itm4'];
		$itm[$i][4]=$row['itm5'];
		$itm[$i][5]=$row['itm6'];
		$itm[$i][6]=$row['itm7'];
		$itm[$i][7]=$row['itm8'];
		$itm[$i][8]=$row['itm9'];
		$itm[$i][9]=$row['itm10'];
		
		$i++;
	}
	
	//pr_table
	$sql = "SELECT * FROM pr_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$pr=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$pr[$i][0]=$row['pr1'];
		$pr[$i][1]=$row['pr2'];
		$pr[$i][2]=$row['pr3'];
		$pr[$i][3]=$row['pr4'];
		$pr[$i][4]=$row['pr5'];
		$pr[$i][5]=$row['pr6'];
		$pr[$i][6]=$row['pr7'];
		
		$i++;
	}
	
	//shp_table
	$sql = "SELECT * FROM shp_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$shp=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$shp[$i][0]=$row['shp1'];
		$shp[$i][1]=$row['shp2'];
		$shp[$i][2]=$row['shp3'];
		$shp[$i][3]=$row['shp4'];
		$shp[$i][4]=$row['shp5'];
		$shp[$i][5]=$row['shp6'];
		$shp[$i][6]=$row['shp7'];
		$shp[$i][7]=$row['shp8'];
		$shp[$i][8]=$row['shp9'];
		$shp[$i][9]=$row['shp10'];
		$shp[$i][10]=$row['shp11'];
		
		$i++;
	}
	
	//cs_table
	$sql = "SELECT * FROM cs_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$cs=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$cs[$i][0]=$row['cs1'];
		$cs[$i][1]=$row['cs2'];
		$cs[$i][2]=$row['cs3'];
		$cs[$i][3]=$row['cs4'];
		$cs[$i][4]=$row['cs5'];
		$cs[$i][5]=$row['cs6'];
		$cs[$i][6]=$row['cs7'];
		
		$i++;
	}
	
	//pmt_table
	$sql = "SELECT * FROM pmt_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$pmt=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$pmt[$i][0]=$row['pmt1'];
		$pmt[$i][1]=$row['pmt2'];
		$pmt[$i][2]=$row['pmt3'];

		$i++;
	}
		
	//lg_table
	$sql = "SELECT * FROM lg_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	
	$lg=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$lg[$i][0]=$row['lg1'];
		$lg[$i][1]=$row['lg2'];
		$lg[$i][2]=$row['lg3'];
		$lg[$i][3]=$row['lg4'];
		$lg[$i][4]=$row['lg5'];
		$lg[$i][5]=$row['lg6'];
		$lg[$i][6]=$row['lg7'];
		
		$i++;
	}
	
	$numOfRows=$i;
	//all together
	$allData=array();
	$allData['or']=$or;
    $allData['itm']=$itm;
	$allData['pr']=$pr;
    $allData['shp']=$shp;
    $allData['cs']=$cs;
    $allData['pmt']=$pmt;
    $allData['lg']=$lg;
?>