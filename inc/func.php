<?php
	// Functions
	function redirect( $location = NULL ) {
	  if ($location != NULL) {
	    header("Location: {$location}");
	    exit;
	  }
	}
	function checklog($sees, $to = NULL){
		if(isset($sees)){
			header("Location: {$to}");
			exit;
		}
	}
	function checkin($var){
		$var = trim($var);
		$var = strip_tags($var);
		$var = htmlspecialchars($var);
		return $var;
	}

	
?>