<?php
function uploadCsvFile()
{	
	$target_dir = "upload/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
		if(in_array($_FILES['fileToUpload']['type'],$mimes))
		{
			$uploadOk = 1;
		} else 
		{
			$uploadOk = 0;
			$textResult = array();
			$textResult[0] = 0;
			$textResult[1] = '
			<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
				<span class="closebtn" onclick="closeButton()">&times;</span> 
				<h5>Sorry, only CSV type allowed.</h5>
			</div>';
			return $textResult;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) 
	{
		$uploadOk = 0;
		$textResult = array();
		$textResult[0] = 0;
		$textResult[1] = '
			<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
				<span class="closebtn" onclick="closeButton()">&times;</span> 
				<h5>Sorry, file already exists.</h5>
			</div>';
		return $textResult;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) 
	{
		$uploadOk = 0;
		$textResult = array();
		$textResult[0] = 0;
		$textResult[1] = '
			<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
				<span class="closebtn" onclick="closeButton()">&times;</span> 
				<h5>Sorry, your file is too large.</h5>
			</div>';
		return $textResult;
	}
	
	// Allow certain file formats
	if($imageFileType != "csv") {
		$uploadOk = 0;
		$textResult = array();
		$textResult[0] = 0;
		$textResult[1] = '
			<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
				<span class="closebtn" onclick="closeButton()">&times;</span> 
				<h5>Sorry, only CSV files are allowed.</h5>
			</div>';
		return $textResult;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		return "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			$textResult = array();
			$textResult[0] = 1;
			$textResult[1] = '
				<div id="message" class="w3-panel alert success" style="margin-top:0px;position:fixed;width:100%;">
					<span class="closebtn" onclick="closeButton()">&times;</span> 
					<h5>Success!</h5>
					<p>The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.</p>
				</div>';
				
			return $textResult;
		} else 
		{
			$textResult = array();
			$textResult[0] = 0;
			$textResult[1] = '
				<div id="message" class="w3-panel alert" style="margin-top:0px;position:fixed;width:100%;">
					<span class="closebtn" onclick="closeButton()">&times;</span> 
					<h5>Sorry, there was an error uploading your file.</h5>
				</div>';
			return $textResult;
		}
	}
}
?>