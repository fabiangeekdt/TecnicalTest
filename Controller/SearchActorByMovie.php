<?php
	header("access-control-allow-origin: *");
	
	include("init.php");
	include("tmdb-api.php");
	
	$actor = $_POST['actor']; 
	
	
	//instantie TMDB API with my key API
	$tmdb = new TMDB($apikey, 'en', true);
	//search for the indicate person
	$persons = $tmdb->searchPerson($actor);
	foreach($persons as $person){
		echo '<li>'. $person->getName() .' (<a href="https://www.themoviedb.org/person/'. $person->getID() .'">'. $person->getID() .'</a>)</li>';
		
		//Get all the movie roles
			//get all the movie tittles in an array
				//Call a function for showin the tittles in chronological order (create a function that compares dates in another .php file)
				//echo the result to the .html site
			
	}
	
		

?>
	