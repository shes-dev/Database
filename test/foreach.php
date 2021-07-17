<?php
	
	//ERRORS DISPLAY
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	$name = 'a';
	
	$conversion_array = [
      "a"=>"new_a",
      "b"=>"new_b",
      "c"=>"new_c"
    ];
    
	echo '<pre>';
	echo '<h1>before:</h1>';
	var_dump($name);
	echo '</pre>';
	
    foreach($conversion_array as $old_name => $new_name){
      if($name == $old_name) $name = $new_name;
    }
	
	echo '<pre>';
	echo '<h1>after:</h1>';
	var_dump($name);
	echo '</pre>';
	
	echo '<pre>';
	echo '<h1>check:</h1>';
	foreach($conversion_array as $new_name){
      echo $new_name.'<br>';
    }
	echo '</pre>';
	
	function _validatePostInputParams($params = []) {

    	// not params to test -> valid

    	if (count($params) < 1) {
    		echo 'params empty';
    	}


    	// for multiple params sets, if at least one is valid -> valid

    	$params = is_array($params[0]) ? $params : [$params];


    	$missing_params = [];

    	$valid = FALSE;

    	if (is_array($params[0])) {
    		foreach ($params as $params_array) {

    			$valid_params_array = TRUE;
    			foreach ($params_array as $param){

		            if ($_POST[$param] === FALSE){
		            	$missing_params[] = $param;  
		            	$valid_params_array = FALSE;  
		            }
		        }

		        // print_r($params_array);
		        // echo "\nvalid_params_array: ".$valid_params_array."\n\n";

		        $valid = $valid || $valid_params_array;
    		}
    	}


    	if (!$valid) {
    		echo 'missing_params';
    	}

		echo '<br>';
        var_dump($valid);        
    }
	
	echo '<pre>';
	echo '<h1>test:</h1>';
	$a = array("car");
	_validatePostInputParams($a);
	echo '</pre>';
	
?>