<?php

//GET INPUT NUMBER
$sql = "SELECT * FROM status_table ORDER BY timestamp DESC";
$query = mysqli_query($con,$sql);
$statusInputNumber=array();
$i=0;

while($row = $query->fetch_assoc()) 
{
	$statusInputNumber[$i]=$row['inputNumber'];
	$i++;
}

?>