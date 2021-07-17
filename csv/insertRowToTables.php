<?php

//INSERTING TABLES
$lines=array();
$line=array();
$lines=$_POST;
$linesLength = count($lines);

//GET INPUT NUMBER
$inputNumber = $_SESSION['inputNumber'];
$editRow = $_POST['saveRow'];
$editRowForDisplay = $editRow+1;

//GET UPDATE NUMBER
$sql = "SELECT * FROM update_table WHERE inputNumber = $inputNumber ORDER BY timestamp DESC LIMIT 1 ";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query,MYSQLI_ASSOC);	
			
$updateNumber = $row['newUpdateNumber'];

//INSERT

	//INSERT OR TABLE
	for ($i=0;$i<9;$i++)
	{
		$rowIndex='or_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_or_table (number,row,updateNumber,or1,or2,or3,or4,or5,or6,or7,or8,or9) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]','$line[8]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT ITM TABLE
	for ($i=0;$i<10;$i++)
	{
		$rowIndex='itm_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_itm_table (number,row,updateNumber,itm1,itm2,itm3,itm4,itm5,itm6,itm7,itm8,itm9,itm10) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]','$line[8]','$line[9]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT PR TABLE
	for ($i=0;$i<7;$i++)
	{
		$rowIndex='pr_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_pr_table (number,row,updateNumber,pr1,pr2,pr3,pr4,pr5,pr6,pr7) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT Z TABLE
	for ($i=0;$i<4;$i++)
	{
		$rowIndex='z_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_z_table (number,row,updateNumber,z1,z2,z3,z4) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]')";
	$query = mysqli_query($con,$sql);
	
	
	//INSERT SHP TABLE
	for ($i=0;$i<11;$i++)
	{
		$rowIndex='shp_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_shp_table (number,row,updateNumber,shp1,shp2,shp3,shp4,shp5,shp6,shp7,shp8,shp9,shp10,shp11) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]','$line[8]','$line[9]','$line[10]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT CS TABLE
	for ($i=0;$i<7;$i++)
	{
		$rowIndex='cs_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_cs_table (number,row,updateNumber,cs1,cs2,cs3,cs4,cs5,cs6,cs7) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT PMT TABLE
	for ($i=0;$i<4;$i++)
	{
		$rowIndex='pmt_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_pmt_table (number,row,updateNumber,pmt1,pmt2,pmt3,pmt4) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT LG TABLE
	for ($i=0;$i<7;$i++)
	{
		$rowIndex='lg_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_lg_table (number,row,updateNumber,lg1,lg2,lg3,lg4,lg5,lg6,lg7) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]')";
	$query = mysqli_query($con,$sql);
	
	//INSERT BB TABLE
	for ($i=0;$i<4;$i++)
	{
		$rowIndex='bb_'.$editRow.'_'.$i;
		$line[$i]=$lines[$rowIndex];
	}
	
	$sql = "INSERT INTO update_bb_table (number,row,updateNumber,bb1,bb2,bb3,bb4) VALUES ('$inputNumber','$editRow','$updateNumber','$line[0]','$line[1]','$line[2]','$line[3]')";
	$query = mysqli_query($con,$sql);
	
	
	//INSERT INPUT TABLE
	$newInputNumber = $inputNumber + 1;
	$newUpdateNumber = $updateNumber + 1;
	$sql = "INSERT INTO update_table (input1,inputNumber,updateNumber,newInputNumber,newUpdateNumber) VALUES ('INPUT $inputNumber LINE $editRowForDisplay UPDATED','$inputNumber','$updateNumber','$newInputNumber','$newUpdateNumber')";
	$query = mysqli_query($con,$sql);

	//INSERT STATUS TABLE
	$sql = "INSERT INTO status_table (status, inputNumber, updateNumber) VALUES ('INPUT $inputNumber Row $editRowForDisplay updated successfully','$inputNumber','$updateNumber')";
	$query = mysqli_query($con,$sql);
	
	if($query)
	{
		echo '<script>
		// Create a new element
		var newNode = document.createElement(\'div\');
		newNode.id="message";
		newNode.className="w3-panel alert success";
		newNode.style="margin-top:0px;position:fixed;width:100%;";
		newNode.innerHTML="<span class=\"closebtn\" onclick=\"closeButton()\">&times;</span><p>Row '.$editRowForDisplay.' of input '.$inputNumber.' has been updated successfully.</p>";
		
		// Get the reference node
		var referenceNode = document.querySelector(\'#topMenu\');

		// Insert the new node before the reference node
		referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
		</script>';
	}
	else
	{
		echo '<script> 
		// Create a new element
		var newNode = document.createElement(\'div\');
		newNode.id="message";
		newNode.className="w3-panel alert";
		newNode.style="margin-top:0px;position:fixed;width:100%;";
		newNode.innerHTML="<span class=\"closebtn\" onclick=\"closeButton()\">&times;</span><p>Row '.$editRowForDisplay.' of input '.$inputNumber.' has not been updated.</p>";
		
		// Get the reference node
		var referenceNode = document.querySelector(\'#topMenu\');

		// Insert the new node before the reference node
		referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
		</script>';
	}
	
	//var_dump($_SESSION['rowUpdateAlert']);
	
?>