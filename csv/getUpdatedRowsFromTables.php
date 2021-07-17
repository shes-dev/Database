<?php
	
	$requestedRowNumber = $_POST['saveRow'];
	$requestedInputNumber = $_SESSION['inputNumber'];
	
	//or_table
	$sql = "SELECT * FROM update_or_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$or_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
	
		$or_update[$i][0]=$row['or1'];
		$or_update[$i][1]=$row['or2'];
		$or_update[$i][2]=$row['or3'];
		$or_update[$i][3]=$row['or4'];
		$or_update[$i][4]=$row['or5'];
		$or_update[$i][5]=$row['or6'];
		$or_update[$i][6]=$row['or7'];
		$or_update[$i][7]=$row['or8'];
		$or_update[$i][8]=$row['or9'];
		
		$i++;
	}
	
	//itm_table
	$sql = "SELECT * FROM update_itm_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$itm_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$itm_update[$i][0]=$row['itm1'];
		$itm_update[$i][1]=$row['itm2'];
		$itm_update[$i][2]=$row['itm3'];
		$itm_update[$i][3]=$row['itm4'];
		$itm_update[$i][4]=$row['itm5'];
		$itm_update[$i][5]=$row['itm6'];
		$itm_update[$i][6]=$row['itm7'];
		$itm_update[$i][7]=$row['itm8'];
		$itm_update[$i][8]=$row['itm9'];
		$itm_update[$i][9]=$row['itm10'];
		
		$i++;
	}
	
	//pr_table
	$sql = "SELECT * FROM update_pr_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$pr_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$pr_update[$i][0]=$row['pr1'];
		$pr_update[$i][1]=$row['pr2'];
		$pr_update[$i][2]=$row['pr3'];
		$pr_update[$i][3]=$row['pr4'];
		$pr_update[$i][4]=$row['pr5'];
		$pr_update[$i][5]=$row['pr6'];
		$pr_update[$i][6]=$row['pr7'];
		
		$i++;
	}
	
	//z_table
	$sql = "SELECT * FROM update_z_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$z_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$z_update[$i][0]=$row['z1'];
		$z_update[$i][1]=$row['z2'];
		$z_update[$i][2]=$row['z3'];
		$z_update[$i][3]=$row['z4'];
				
		$i++;
	}
	
	//shp_table
	$sql = "SELECT * FROM update_shp_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$shp_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$shp_update[$i][0]=$row['shp1'];
		$shp_update[$i][1]=$row['shp2'];
		$shp_update[$i][2]=$row['shp3'];
		$shp_update[$i][3]=$row['shp4'];
		$shp_update[$i][4]=$row['shp5'];
		$shp_update[$i][5]=$row['shp6'];
		$shp_update[$i][6]=$row['shp7'];
		$shp_update[$i][7]=$row['shp8'];
		$shp_update[$i][8]=$row['shp9'];
		$shp_update[$i][9]=$row['shp10'];
		$shp_update[$i][10]=$row['shp11'];
		
		$i++;
	}
	
	//cs_table
	$sql = "SELECT * FROM update_cs_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$cs_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$cs_update[$i][0]=$row['cs1'];
		$cs_update[$i][1]=$row['cs2'];
		$cs_update[$i][2]=$row['cs3'];
		$cs_update[$i][3]=$row['cs4'];
		$cs_update[$i][4]=$row['cs5'];
		$cs_update[$i][5]=$row['cs6'];
		$cs_update[$i][6]=$row['cs7'];
		
		$i++;
	}
	
	//pmt_table
	$sql = "SELECT * FROM update_pmt_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$pmt_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$pmt_update[$i][0]=$row['pmt1'];
		$pmt_update[$i][1]=$row['pmt2'];
		$pmt_update[$i][2]=$row['pmt3'];
		$pmt_update[$i][3]=$row['pmt4'];

		$i++;
	}
		
	//lg_table
	$sql = "SELECT * FROM update_lg_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$lg_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$lg_update[$i][0]=$row['lg1'];
		$lg_update[$i][1]=$row['lg2'];
		$lg_update[$i][2]=$row['lg3'];
		$lg_update[$i][3]=$row['lg4'];
		$lg_update[$i][4]=$row['lg5'];
		$lg_update[$i][5]=$row['lg6'];
		$lg_update[$i][6]=$row['lg7'];
		
		$i++;
	}
	
	//bb_table
	$sql = "SELECT * FROM update_bb_table WHERE number = '$requestedInputNumber' AND row='$requestedRowNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	
	$bb_update=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$bb_update[$i][0]=$row['bb1'];
		$bb_update[$i][1]=$row['bb2'];
		$bb_update[$i][2]=$row['bb3'];
		$bb_update[$i][3]=$row['bb4'];

		$i++;
	}
	
	$numOfRows=$i;
	
	//all together
	$allUpdatedData=array();
	$allUpdatedData['or_updated']=$or_update;
	$allUpdatedData['itm_updated']=$itm_update;
	$allUpdatedData['pr_updated']=$pr_update;
	$allUpdatedData['z_updated']=$z_update;
	$allUpdatedData['shp_updated']=$shp_update;
	$allUpdatedData['cs_updated']=$cs_update;
	$allUpdatedData['pmt_updated']=$pmt_update;
	$allUpdatedData['lg_updated']=$lg_update;
	$allUpdatedData['bb_updated']=$bb_update;
	
	//echo '<pre>';
	//var_dump($allUpdatedData);
	//echo '</pre>';

?>