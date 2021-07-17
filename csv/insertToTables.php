<?php

//INSERTING TABLES
$line=array();
$linesLength = count($lines);

//DEBUGGING	
//	echo '<pre>';
//	var_dump($lines);
//	echo '</pre>';
//	die();

//GET INPUT NUMBER
$sql = "SELECT * FROM input_table ORDER BY timestamp DESC LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query,MYSQLI_ASSOC);	
			
$inputNumber = $row['newInputNumber'];

//DEBUGGING	
//	echo '<pre>';
//	var_dump($inputNumber);
//	var_dump($linesLength);
//	echo '</pre>';
	
//INSERT - STARTING FROM 1 BECAUSE HEADERS ROW IS 0
for($m=1;$m<$linesLength;$m++)

//DEBUGGING
	//for($m=1;$m<2;$m++)
{
	$rowNumber=$m;
	
	//INSERT OR TABLE
	for ($i=0;$i<9;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO or_table (number,row,or1,or2,or3,or4,or5,or6,or7,or8,or9) VALUES ('$inputNumber','$rowNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]','$line[8]')";
	$query = mysqli_query($con,$sql);
	
//DEBUGGING	
	//var_dump($con);
	
	//INSERT ITM TABLE
	for ($i=9;$i<19;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO itm_table (number,row,itm1,itm2,itm3,itm4,itm5,itm6,itm7,itm8,itm9,itm10) VALUES ('$inputNumber','$rowNumber','$line[9]','$line[10]','$line[11]','$line[12]','$line[13]','$line[14]','$line[15]','$line[16]','$line[17]','$line[18]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT PR TABLE
	for ($i=19;$i<26;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO pr_table (number,row,pr1,pr2,pr3,pr4,pr5,pr6,pr7) VALUES ('$inputNumber','$rowNumber','$line[19]','$line[20]','$line[21]','$line[22]','$line[23]','$line[24]','$line[25]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT SHP TABLE
	for ($i=26;$i<37;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO shp_table (number,row,shp1,shp2,shp3,shp4,shp5,shp6,shp7,shp8,shp9,shp10,shp11) VALUES ('$inputNumber','$rowNumber','$line[26]','$line[27]','$line[28]','$line[29]','$line[30]','$line[31]','$line[32]','$line[33]','$line[34]','$line[35]','$line[36]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT CS TABLE
	for ($i=37;$i<44;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO cs_table (number,row,cs1,cs2,cs3,cs4,cs5,cs6,cs7) VALUES ('$inputNumber','$rowNumber','$line[37]','$line[38]','$line[39]','$line[40]','$line[41]','$line[42]','$line[43]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT PMT TABLE
	for ($i=44;$i<47;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO pmt_table (number,row,pmt1,pmt2,pmt3,pmt4) VALUES ('$inputNumber','$rowNumber','$line[44]','$line[45]','$line[46]','pmt4')";
	$query = mysqli_query($con,$sql);
	
	//INSERT LG TABLE
	for ($i=47;$i<54;$i++)
	{
		$line[$i]=$lines[$m][$i];
	}
	
	$sql = "INSERT INTO lg_table (number,row,lg1,lg2,lg3,lg4,lg5,lg6,lg7) VALUES ('$inputNumber','$rowNumber','$line[47]','$line[48]','$line[49]','$line[50]','$line[51]','$line[52]','$line[53]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT Z TABLE
	$sql = "INSERT INTO z_table (number,row,z1,z2,z3,z4) VALUES ('$inputNumber','$rowNumber','z1','z2','z3','z4')";
	$query = mysqli_query($con,$sql);
	
	//INSERT BB TABLE
	$sql = "INSERT INTO bb_table (number,row,bb1,bb2,bb3,bb4) VALUES ('$inputNumber','$rowNumber','bb1','bb2','bb3','bb4')";
	$query = mysqli_query($con,$sql);
		
	//INSERT INPUT TABLE
	$newInputNumber = $inputNumber + 1;
	$sql = "INSERT INTO input_table (input1,inputNumber,newInputNumber,updateToInput) VALUES ('INPUT $inputNumber LINE $rowNumber INSERTED','$inputNumber','$newInputNumber','$inputNumber')";
	$query = mysqli_query($con,$sql);
}
	
	//INSERT STATUS TABLE
	$uploadFileName = basename( $_FILES["fileToUpload"]["name"]);
	$sql = "INSERT INTO status_table (status, inputNumber,fileName) VALUES ('INPUT $inputNumber uploaded successfully - $uploadFileName','$inputNumber','$uploadFileName')";
	$query = mysqli_query($con,$sql);
	
?>