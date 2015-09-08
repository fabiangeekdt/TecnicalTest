<?php
	define('ROOT_DIR', dirname(__FILE__));
	define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(ROOT_DIR))));
	
	//the movieBD api Key
	$apikey = "403e35b3672c94ac8a22ec88ffa2848d";	
?>