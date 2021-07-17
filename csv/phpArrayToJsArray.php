<?php
	echo '<script type=\'text/javascript\'>';
	$js_array = json_encode($allData);
	echo "var javascript_array = ". $js_array . ";\n";
	echo "console.log('javascript array',javascript_array);";
	echo '</script>';
?>