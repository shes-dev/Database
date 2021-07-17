<?php

$row = 0;

//if (($handle = fopen("csv/test.csv", "r")) !== FALSE) 
if (($handle = fopen("upload/uploads/".basename( $_FILES["fileToUpload"]["name"]), "r")) !== FALSE) 
{
    $lines = array();
	
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	{
        $num = count($data);
        
		//SINGLE LINE ARRAY	OUTPUT
			//echo "<p> $num fields in line $row: <br /></p>\n";
        
        for ($c=0; $c < $num; $c++) 
		{
            //echo $data[$c] . "<br />\n";
			$lines[$row][$c]=$data[$c];
        }
		
		$row++;
	}
	
	//ARRAY OF LINES ARRAY OUTPUT
	//echo '<pre>';
	//var_dump($lines);
	//var_dump(count($lines));
	//echo '</pre>';
    
	fclose($handle);
}
?>