<?php
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?ei=9cv_XaTCBsqD8gLo3rr4DQ&q=1+dolar+to+nis&oq=1+dolar+to+nis&gs_l=psy-ab.3..0i10j0i22i10i30l4j0i22i30l5.2475.9534..9710...0.4..0.968.2901.0j11j1j6-1......0....1..gws-wiz.......0i71j0i131j0j0i67j0i3.NQGoCNj-9Hc&ved=0ahUKEwjkkJOvhsrmAhXKgVwKHWivDt8Q4dUDCAs&uact=5");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);  

		//var_dump($output);
		
		$a = strpos($output, 'Israeli New Shekel');
		
		//var_dump($a);
		$a = $a-5;
		$b = substr($output, $a); 
		$c = substr($b, 0, 5); 
		var_dump($c);
?>