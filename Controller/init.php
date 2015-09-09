<?php
/**
 * 	This php file handles the global variables of the website
 *
 * 	@author Fabian Moreno
 * 	@version 0.1
 * 	@date 08/09/2015	
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */
	define('ROOT_DIR', dirname(__FILE__));
	define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(ROOT_DIR))));
	
	//the movieBD api Key
	$apikey = "403e35b3672c94ac8a22ec88ffa2848d";	
?>