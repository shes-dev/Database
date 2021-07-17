	<?php

	if($requestedRowNumber<$numOfRows || $requestedRowNumber==$numOfRows) 
	{			
		$or[$requestedRowNumber][0]=$or_update[0][0];
		$or[$requestedRowNumber][1]=$or_update[0][1];
		$or[$requestedRowNumber][2]=$or_update[0][2];
		$or[$requestedRowNumber][3]=$or_update[0][3];
		$or[$requestedRowNumber][4]=$or_update[0][4];
		$or[$requestedRowNumber][5]=$or_update[0][5];
		$or[$requestedRowNumber][6]=$or_update[0][6];
		$or[$requestedRowNumber][7]=$or_update[0][7];
		$or[$requestedRowNumber][8]=$or_update[0][8];
		
		$itm[$requestedRowNumber][0]=$itm_update[0][0];
		$itm[$requestedRowNumber][1]=$itm_update[0][1];
		$itm[$requestedRowNumber][2]=$itm_update[0][2];
		$itm[$requestedRowNumber][3]=$itm_update[0][3];
		$itm[$requestedRowNumber][4]=$itm_update[0][4];
		$itm[$requestedRowNumber][5]=$itm_update[0][5];
		$itm[$requestedRowNumber][6]=$itm_update[0][6];
		$itm[$requestedRowNumber][7]=$itm_update[0][7];
		$itm[$requestedRowNumber][8]=$itm_update[0][8];
		$itm[$requestedRowNumber][9]=$itm_update[0][9];
		
		$pr[$requestedRowNumber][0]=$pr_update[0][0];
		$pr[$requestedRowNumber][1]=$pr_update[0][1];
		$pr[$requestedRowNumber][2]=$pr_update[0][2];
		$pr[$requestedRowNumber][3]=$pr_update[0][3];
		$pr[$requestedRowNumber][4]=$pr_update[0][4];
		$pr[$requestedRowNumber][5]=$pr_update[0][5];
		$pr[$requestedRowNumber][6]=$pr_update[0][6];
		
		$z[$requestedRowNumber][0]=$z[0][0];
		$z[$requestedRowNumber][1]=$z[0][1];
		$z[$requestedRowNumber][2]=$z[0][2];
		$z[$requestedRowNumber][3]=$z[0][3];
				
		$shp[$requestedRowNumber][0]=$shp_update[0][0];
		$shp[$requestedRowNumber][1]=$shp_update[0][1];
		$shp[$requestedRowNumber][2]=$shp_update[0][2];
		$shp[$requestedRowNumber][3]=$shp_update[0][3];
		$shp[$requestedRowNumber][4]=$shp_update[0][4];
		$shp[$requestedRowNumber][5]=$shp_update[0][5];
		$shp[$requestedRowNumber][6]=$shp_update[0][6];
		$shp[$requestedRowNumber][7]=$shp_update[0][7];
		$shp[$requestedRowNumber][8]=$shp_update[0][8];
		$shp[$requestedRowNumber][9]=$shp_update[0][9];
		$shp[$requestedRowNumber][10]=$shp_update[0][10];
		
		$cs[$requestedRowNumber][0]=$cs_update[0][0];
		$cs[$requestedRowNumber][1]=$cs_update[0][1];
		$cs[$requestedRowNumber][2]=$cs_update[0][2];
		$cs[$requestedRowNumber][3]=$cs_update[0][3];
		$cs[$requestedRowNumber][4]=$cs_update[0][4];
		$cs[$requestedRowNumber][5]=$cs_update[0][5];
		$cs[$requestedRowNumber][6]=$cs_update[0][6];
		
		$pmt[$requestedRowNumber][0]=$pmt_update[0][0];
		$pmt[$requestedRowNumber][1]=$pmt_update[0][1];
		$pmt[$requestedRowNumber][2]=$pmt_update[0][2];
		$pmt[$requestedRowNumber][3]=$pmt_update[0][3];
		
		$lg[$requestedRowNumber][0]=$lg_update[0][0];
		$lg[$requestedRowNumber][1]=$lg_update[0][1];
		$lg[$requestedRowNumber][2]=$lg_update[0][2];
		$lg[$requestedRowNumber][3]=$lg_update[0][3];
		$lg[$requestedRowNumber][4]=$lg_update[0][4];
		$lg[$requestedRowNumber][5]=$lg_update[0][5];
		$lg[$requestedRowNumber][6]=$lg_update[0][6];
		
		$bb[$requestedRowNumber][0]=$bb[0][0];
		$bb[$requestedRowNumber][1]=$bb[0][1];
		$bb[$requestedRowNumber][2]=$bb[0][2];
		$bb[$requestedRowNumber][3]=$bb[0][3];
	}
	//all together
	$allDataAfterUpdate=array();
	
	$allDataAfterUpdate['or']=$or;
    $allDataAfterUpdate['itm']=$itm;
	$allDataAfterUpdate['pr']=$pr;
	$allDataAfterUpdate['z']=$z;
    $allDataAfterUpdate['shp']=$shp;
    $allDataAfterUpdate['cs']=$cs;
    $allDataAfterUpdate['pmt']=$pmt;
    $allDataAfterUpdate['lg']=$lg;
    $allDataAfterUpdate['bb']=$bb;
	
	//echo '<pre>';
	//var_dump($allDataAfterUpdate);
	//var_dump($requestedRowNumber);
	//echo '</pre>';
	
	//adding new rows
	
	$currentLength=$numOfRows;
	$totalLength=$currentLength+count($or_newLines);
	$i=0;
	
	for($m=$currentLength;$m<$totalLength;$m++)
	{
		$allDataAfterUpdate['or'][$m]=$allNewLinesData['or_newLines'][$i];
		$allDataAfterUpdate['itm'][$m]=$allNewLinesData['itm_newLines'][$i];
		$allDataAfterUpdate['pr'][$m]=$allNewLinesData['pr_newLines'][$i];
		$allDataAfterUpdate['z'][$m]=$allNewLinesData['z_newLines'][$i];
		$allDataAfterUpdate['shp'][$m]=$allNewLinesData['shp_newLines'][$i];
		$allDataAfterUpdate['cs'][$m]=$allNewLinesData['cs_newLines'][$i];
		$allDataAfterUpdate['pmt'][$m]=$allNewLinesData['pmt_newLines'][$i];
		$allDataAfterUpdate['lg'][$m]=$allNewLinesData['lg_newLines'][$i];
		$allDataAfterUpdate['bb'][$m]=$allNewLinesData['bb_newLines'][$i];
		$i++;
	}
	
	//var_dump($currentLength);
	//var_dump($totalLength);
	//echo '<pre>';
	//var_dump($allDataAfterUpdate);
	//echo '</pre>';

?>                              
                                