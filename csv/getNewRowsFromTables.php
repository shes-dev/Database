<?php
	
	$requestedRowNumber = $_POST['saveRow'];
	$requestedInputNumber = $_SESSION['inputNumber'];
	
	//getting max row index
	$sql = "SELECT MAX(row) FROM update_or_table WHERE number = '$requestedInputNumber' ORDER BY timestamp DESC LIMIT 1";
	$query = mysqli_query($con,$sql);
	$row = $query->fetch_assoc();
	$maxRow=intval($row['MAX(row)']);
	$newRowsStartingIndex=$numOfRows;
	$newMaxRowIndex=$maxRow+1;
	$i=0;
	
	var_dump($requestedRowNumber);
	var_dump($requestedInputNumber);
	var_dump($maxRow);
	var_dump($newRowsStartingIndex);
	var_dump($newMaxRowIndex);
	
	$or_newLines=array();
	$itm_newLines=array();
	$pr_newLines=array();
	$z_newLines=array();
	$shp_newLines=array();
	$cs_newLines=array();
	$pmt_newLines=array();
	$lg_newLines=array();
	$bb_newLines=array();
	
	for($m=$newRowsStartingIndex;$m<$newMaxRowIndex;$m++)
	{
		//or_table
		$sql = "SELECT * FROM update_or_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
			
		if(!empty($row))
		{
			$or_newLines[$i][0]=$row['or1'];
			$or_newLines[$i][1]=$row['or2'];
			$or_newLines[$i][2]=$row['or3'];
			$or_newLines[$i][3]=$row['or4'];
			$or_newLines[$i][4]=$row['or5'];
			$or_newLines[$i][5]=$row['or6'];
			$or_newLines[$i][6]=$row['or7'];
			$or_newLines[$i][7]=$row['or8'];
			$or_newLines[$i][8]=$row['or9'];
			$t=1;			
		}
		
		//itm_table
		$sql = "SELECT * FROM update_itm_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$itm_newLines[$i][0]=$row['itm1'];
			$itm_newLines[$i][1]=$row['itm2'];
			$itm_newLines[$i][2]=$row['itm3'];
			$itm_newLines[$i][3]=$row['itm4'];
			$itm_newLines[$i][4]=$row['itm5'];
			$itm_newLines[$i][5]=$row['itm6'];
			$itm_newLines[$i][6]=$row['itm7'];
			$itm_newLines[$i][7]=$row['itm8'];
			$itm_newLines[$i][8]=$row['itm9'];
			$itm_newLines[$i][9]=$row['itm10'];
		}	
		
		//pr_table
		$sql = "SELECT * FROM update_pr_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$pr_newLines[$i][0]=$row['pr1'];
			$pr_newLines[$i][1]=$row['pr2'];
			$pr_newLines[$i][2]=$row['pr3'];
			$pr_newLines[$i][3]=$row['pr4'];
			$pr_newLines[$i][4]=$row['pr5'];
			$pr_newLines[$i][5]=$row['pr6'];
			$pr_newLines[$i][6]=$row['pr7'];
		}
		
		//z_table
		$sql = "SELECT * FROM update_z_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$z_newLines[$i][0]=$row['z1'];
			$z_newLines[$i][1]=$row['z2'];
			$z_newLines[$i][2]=$row['z3'];
			$z_newLines[$i][3]=$row['z4'];
		}
		
		//shp_table
		$sql = "SELECT * FROM update_shp_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$shp_newLines[$i][0]=$row['shp1'];
			$shp_newLines[$i][1]=$row['shp2'];
			$shp_newLines[$i][2]=$row['shp3'];
			$shp_newLines[$i][3]=$row['shp4'];
			$shp_newLines[$i][4]=$row['shp5'];
			$shp_newLines[$i][5]=$row['shp6'];
			$shp_newLines[$i][6]=$row['shp7'];
			$shp_newLines[$i][7]=$row['shp8'];
			$shp_newLines[$i][8]=$row['shp9'];
			$shp_newLines[$i][9]=$row['shp10'];
			$shp_newLines[$i][10]=$row['shp11'];
		}

		//cs_table
		$sql = "SELECT * FROM update_cs_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$cs_newLines[$i][0]=$row['cs1'];
			$cs_newLines[$i][1]=$row['cs2'];
			$cs_newLines[$i][2]=$row['cs3'];
			$cs_newLines[$i][3]=$row['cs4'];
			$cs_newLines[$i][4]=$row['cs5'];
			$cs_newLines[$i][5]=$row['cs6'];
			$cs_newLines[$i][6]=$row['cs7'];
		}
		
		//pmt_table
		$sql = "SELECT * FROM update_pmt_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$pmt_newLines[$i][0]=$row['pmt1'];
			$pmt_newLines[$i][1]=$row['pmt2'];
			$pmt_newLines[$i][2]=$row['pmt3'];
			$pmt_newLines[$i][3]=$row['pmt4'];
		}
			
		//lg_table
		$sql = "SELECT * FROM update_lg_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$lg_newLines[$i][0]=$row['lg1'];
			$lg_newLines[$i][1]=$row['lg2'];
			$lg_newLines[$i][2]=$row['lg3'];
			$lg_newLines[$i][3]=$row['lg4'];
			$lg_newLines[$i][4]=$row['lg5'];
			$lg_newLines[$i][5]=$row['lg6'];
			$lg_newLines[$i][6]=$row['lg7'];
		}

		//bb_table
		$sql = "SELECT * FROM update_bb_table WHERE number = '$requestedInputNumber' AND row='$m' ORDER BY timestamp DESC LIMIT 1";
		$query = mysqli_query($con,$sql);
		$row = $query->fetch_assoc();
		
		if(!empty($row))
		{
			$bb_newLines[$i][0]=$row['bb1'];
			$bb_newLines[$i][1]=$row['bb2'];
			$bb_newLines[$i][2]=$row['bb3'];
			$bb_newLines[$i][3]=$row['bb4'];
		}
		
		if($t == 1)
		{
			$i++;
			$t=0;
		}
	}
	//$numOfRows=$i;
	
	//all together
	$allNewLinesData=array();
	$allNewLinesData['or_newLines']=$or_newLines;
	$allNewLinesData['itm_newLines']=$itm_newLines;
	$allNewLinesData['pr_newLines']=$pr_newLines;
	$allNewLinesData['z_newLines']=$z_newLines;
	$allNewLinesData['shp_newLines']=$shp_newLines;
	$allNewLinesData['cs_newLines']=$cs_newLines;
	$allNewLinesData['pmt_newLines']=$pmt_newLines;
	$allNewLinesData['lg_newLines']=$lg_newLines;
	$allNewLinesData['bb_newLines']=$bb_newLines;
	
	echo '<pre>';
	var_dump($allNewLinesData);
	echo '</pre>';

?>