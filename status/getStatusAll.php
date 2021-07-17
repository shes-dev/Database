<?php

//GET INPUT NUMBER
$sql = "SELECT * FROM status_table ORDER BY timestamp DESC";
$query = mysqli_query($con,$sql);
$status=array();
$statusTime=array();
$statusTimestamp=array();
$statusInputNumber=array();
$i=0;

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
	
	//echo 'time:'.$time.'<br>';
	
	$statusTime[$i]=humanTiming($time);
	$statusTimestamp[$i]=$row['timestamp'];
	$statusInputNumber[$i]=$row['inputNumber'];
	
	//echo 'statusTime:'.$statusTime[$i].'<br>';
	
	$i++;
}

?>