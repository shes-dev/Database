<?php

					for($m=0;$m<$numOfRows;$m++)
					{
						echo '<tr>';
						//or_table
						for($i=0;$i<count($or[$m]);$i++)
						{
							echo '<td>'.$or[$m][$i].'</td>';
						}
						
						//itm_table
						for($i=0;$i<count($itm[$m]);$i++)
						{
							echo '<td>'.$itm[$m][$i].'</td>';
						}
						
						//pr_table
						for($i=0;$i<count($pr[$m]);$i++)
						{
							echo '<td>'.$pr[$m][$i].'</td>';
						}
						
						//z_table
						for($i=0;$i<count($z[$m]);$i++)
						{
							echo '<td>'.$z[$m][$i].'</td>';
						}
						
						//z_table
						//for($i=0;$i<count($z[$m]);$i++)
						//{
						//	if($i == 1) {
						//		$result = $pr[$m][0]*3.492;
						//		echo '<td>'.$result.'</td>';
						//	}
						//	if($i == 2) {
						//		if(strtolower($shp[$m][1]) == 'israel') {
						//			$vat = 0.17;
						//			echo '<td>0.17</td>';
						//		} else {
						//			$vat = 0;
						//			echo '<td>0</td>';
						//		}
						//	}
						//	if($i == 3) {
						//		$price = $result;
						//		$vat_plus_one = $vat+1;
						//		$total = $price/$vat_plus_one;
						//		echo '<td>'.$total.'</td>';
						//	}
						//}
						
						
						//shp_table
						for($i=0;$i<count($shp[$m]);$i++)
						{
							echo '<td>'.$shp[$m][$i].'</td>';
						}
						
						//cs_table
						for($i=0;$i<count($cs[$m]);$i++)
						{
							echo '<td>'.$cs[$m][$i].'</td>';
						}
						
						//pmt_table
						for($i=0;$i<count($pmt[$m]);$i++)
						{
							echo '<td>'.$pmt[$m][$i].'</td>';
						}
						
						//lg_table
						for($i=0;$i<count($lg[$m]);$i++)
						{
							echo '<td>'.$lg[$m][$i].'</td>';
						}
						
						//bb_table
						for($i=0;$i<count($bb[$m]);$i++)
						{
							echo '<td>'.$bb[$m][$i].'</td>';
						}
						echo '</tr>';
					}

?>