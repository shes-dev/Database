<?php
	
	//get row updates
	$sql = "SELECT inputNumber,updateNumber,input1 FROM update_table ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	$updates=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$updates['inputNumber'][$i]=$row['inputNumber'];
		$updates['updateNumber'][$i]=$row['updateNumber'];
		$updates['input1'][$i]=$row['input1'];
		$i++;
	}
	
	//echo '<pre>';
	//var_dump($updates);
	//echo '</pre>';
	
	//get full updates
	$sql = "SELECT DISTINCT inputNumber,updateNumber,updateToInput FROM input_table ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
	$fullUpdates=array();
	$i=0;
	
	while($row = $query->fetch_assoc()) 
	{
		$fullUpdates['inputNumber'][$i]=$row['inputNumber'];
		$fullUpdates['updateNumber'][$i]=$row['updateNumber'];
		$fullUpdates['updateToInput'][$i]=$row['updateToInput'];
		$fullUpdates['fileName'][$i]='';
		$fullUpdates['timestamp'][$i]='';
		$i++;
	}
	
	//echo '<pre>';
	//var_dump($fullUpdates);
	//echo '</pre>';
	
	//get file names and timestamp
	$sql = "SELECT inputNumber,fileName,timestamp FROM status_table WHERE updateNumber = '0' ORDER BY timestamp DESC";
	$query = mysqli_query($con,$sql);
		
	while($row = $query->fetch_assoc()) 
	{
		if(empty($row['fileName']))
		{
			continue;
		}	
		
		for($m=0;$m<count($fullUpdates['inputNumber']);$m++)
		{
			if($row['inputNumber']==$fullUpdates['inputNumber'][$m])
			{
				$fullUpdates['fileName'][$m]=$row['fileName'];
				$fullUpdates['timestamp'][$m]=$row['timestamp'];
			}
			else
			{
				if(!empty($fullUpdates['fileName'][$m])) continue;
				else
				{
					$fullUpdates['fileName'][$m]='';
					$fullUpdates['timestamp'][$m]='';
				}
			}
		}
	}
	
	//echo '<pre>';
	//var_dump($fullUpdates);
	//echo '</pre>';
	
?>