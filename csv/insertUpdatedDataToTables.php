<?php
	//setting header row
	for ($i=0;$i<63;$i++)
	{
		$lines['updatedData'][0][$i]='update';
	}
	
	//echo '<pre>';
	//echo '<h1>allDataAfterUpdate:</h1>';
	//var_dump(count($allDataAfterUpdate));
	//var_dump($allDataAfterUpdate);
	//echo '</pre>';
	
	for($m=0;$m<count($allDataAfterUpdate['or']);$m++)
	{
		$linesIndexAfterHeader=$m+1;
		
		//INSERT OR TABLE
		for ($i=0;$i<9;$i++)
		{
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['or'][$m][$i];
		}
		
		//INSERT ITM TABLE
		for ($i=9;$i<19;$i++)
		{
			$t=$i-9;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['itm'][$m][$t];
		}
		
		//INSERT PR TABLE
		for ($i=19;$i<26;$i++)
		{
			$t=$i-19;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['pr'][$m][$t];
		}
		
		//INSERT Z TABLE
		for ($i=26;$i<30;$i++)
		{
			$t=$i-26;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['z'][$m][$t];
		}
		
		//INSERT SHP TABLE
		for ($i=30;$i<41;$i++)
		{
			$t=$i-30;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['shp'][$m][$t];
		}
		
		//INSERT CS TABLE
		for ($i=41;$i<48;$i++)
		{
			$t=$i-41;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['cs'][$m][$t];
		}
		
		//INSERT PMT TABLE
		for ($i=48;$i<52;$i++)
		{
			$t=$i-48;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['pmt'][$m][$t];
		}
		
		//INSERT LG TABLE
		for ($i=52;$i<59;$i++)
		{
			$t=$i-52;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['lg'][$m][$t];
		}
		
		//INSERT BB TABLE
		for ($i=59;$i<63;$i++)
		{
			$t=$i-59;
			$lines['updatedData'][$linesIndexAfterHeader][$i]=$allDataAfterUpdate['bb'][$m][$t];
		}
	}

//echo '<h3>LINES:</h3>';
//echo '<pre>';
//var_dump($lines['updatedData']);
//echo '</pre>';

//INSERTING TABLES
$line=array();
$linesLength = count($lines['updatedData']);

//GET INPUT NUMBER
$sql = "SELECT * FROM input_table ORDER BY timestamp DESC LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query,MYSQLI_ASSOC);	
			
$inputNumber = $row['newInputNumber'];

//GET UPDATE NUMBER
$originalInputNumberForUpdate=$_SESSION['inputNumber'];

$sql = "SELECT * FROM update_table WHERE inputNumber = $originalInputNumberForUpdate ORDER BY timestamp DESC LIMIT 1 ";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query,MYSQLI_ASSOC);	
			
$updateNumber = $row['newUpdateNumber'];

//INSERT - STARTING FROM 1 BECAUSE HEADERS ROW IS 0
for($m=1;$m<$linesLength;$m++)
{
	$rowNumber=$m;
	
	//INSERT OR TABLE
	for ($i=0;$i<9;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO or_table (number,row,or1,or2,or3,or4,or5,or6,or7,or8,or9) VALUES ('$inputNumber','$rowNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]','$line[8]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT ITM TABLE
	for ($i=9;$i<19;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO itm_table (number,row,itm1,itm2,itm3,itm4,itm5,itm6,itm7,itm8,itm9,itm10) VALUES ('$inputNumber','$rowNumber','$line[9]','$line[10]','$line[11]','$line[12]','$line[13]','$line[14]','$line[15]','$line[16]','$line[17]','$line[18]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT PR TABLE
	for ($i=19;$i<26;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO pr_table (number,row,pr1,pr2,pr3,pr4,pr5,pr6,pr7) VALUES ('$inputNumber','$rowNumber','$line[19]','$line[20]','$line[21]','$line[22]','$line[23]','$line[24]','$line[25]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT Z TABLE
	for ($i=26;$i<30;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO z_table (number,row,z1,z2,z3,z4) VALUES ('$inputNumber','$rowNumber','$line[26]','$line[27]','$line[28]','$line[29]')";
	$query = mysqli_query($con,$sql);
	
	
	//INSERT SHP TABLE
	for ($i=30;$i<41;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO shp_table (number,row,shp1,shp2,shp3,shp4,shp5,shp6,shp7,shp8,shp9,shp10,shp11) VALUES ('$inputNumber','$rowNumber','$line[30]','$line[31]','$line[32]','$line[33]','$line[34]','$line[35]','$line[36]','$line[37]','$line[38]','$line[39]','$line[40]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT CS TABLE
	for ($i=41;$i<48;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO cs_table (number,row,cs1,cs2,cs3,cs4,cs5,cs6,cs7) VALUES ('$inputNumber','$rowNumber','$line[41]','$line[42]','$line[43]','$line[44]','$line[45]','$line[46]','$line[47]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT PMT TABLE
	for ($i=48;$i<52;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO pmt_table (number,row,pmt1,pmt2,pmt3,pmt4) VALUES ('$inputNumber','$rowNumber','$line[48]','$line[49]','$line[50]','$line[51]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT LG TABLE
	for ($i=52;$i<59;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO lg_table (number,row,lg1,lg2,lg3,lg4,lg5,lg6,lg7) VALUES ('$inputNumber','$rowNumber','$line[52]','$line[53]','$line[54]','$line[55]','$line[56]','$line[57]','$line[58]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT BB TABLE
	for ($i=59;$i<63;$i++)
	{
		$line[$i]=$lines['updatedData'][$m][$i];
	}
	
	$sql = "INSERT INTO bb_table (number,row,bb1,bb2,bb3,bb4) VALUES ('$inputNumber','$rowNumber','$line[59]','$line[60]','$line[61]','$line[62]')";
	$query = mysqli_query($con,$sql);
		
	//INSERT INPUT TABLE
	$newInputNumber = $inputNumber + 1;
	$originalInputNumber = $_SESSION['inputNumber'];
	$sql = "INSERT INTO input_table (input1,inputNumber,newInputNumber,updateToInput,updateNumber) VALUES ('INPUT $inputNumber UPDATE $updateNumber LINE $rowNumber INSERTED | UPDATE $updateNumber TO INPUT $originalInputNumber','$inputNumber','$newInputNumber','$originalInputNumber','$updateNumber')";
	$query = mysqli_query($con,$sql);
}

	//INSERT STATUS TABLE
	$sql = "INSERT INTO status_table (status, inputNumber, updateNumber) VALUES ('INPUT $inputNumber updated successfully | update $updateNumber to input $originalInputNumber','$inputNumber','$updateNumber')";
	$query = mysqli_query($con,$sql);
			
	//request updated table new input number
	$requestedInputNumber = $inputNumber;
	$_SESSION['update'] = 1;
?>