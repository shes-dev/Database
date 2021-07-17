<?php

//GET INPUT NUMBER
$sql = "SELECT * FROM status_table ORDER BY timestamp DESC";
$query = mysqli_query($con,$sql);
$status=array();
$statusTime=array();
$i=0;
$t=0;

function humanTiming ($time)
{

    $time = (time()+2*3600) - $time; // to get the time since that moment
    
	//echo 'time()FromFunction:'.time().'<br>';
	//echo 'timeFromFunction:'.$time.'<br>';
	
	$time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) 
	{
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

while($row = $query->fetch_assoc()) 
{
	$status[$i]=$row['status'];
	
	$time = strtotime($row['timestamp']);
	
	$statusTime[$i]=humanTiming($time);
	
	if (strpos($row['status'], 'uploaded') !== false) 
	{
		$statusInputNumber[$t]=$row['inputNumber'];
		$t++;
	}
		
	$i++;
}

?>