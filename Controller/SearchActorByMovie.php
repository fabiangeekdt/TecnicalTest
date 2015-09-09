<?php
	header("access-control-allow-origin: *");

	include("init.php");
	include("tmdb-api.php");
	
	//declaring variables
	$actor = $_POST['actor']; 
	$actorid;
	$movieRoles = array();
	$arr_actedmovies = array();
	$arr2 = array();
	
	//instantie TMDB API with my key API
	$tmdb = new TMDB($apikey, 'en', true);
	//search for the indicate person
	$persons = $tmdb->searchPerson($actor);
	
	//look for the searched person in the array
	foreach($persons as $person){
		//Get the Actor ID
		$actorid = $person->getID();
	}
	
	//get the Actor 
	$person = $tmdb->getPerson($actorid);		
	//Get all the movie roles
	$movieRoles = $person->getMovieRoles();		
	//get all the movies tittle and release date in an array
	foreach($movieRoles as $movieRole){
		//save records in an array
		$arr2["movietitle"] = $movieRole->getMovieTitle();
		$arr2["releasedate"] = $movieRole->getMovieReleaseDate();
		array_push($arr_actedmovies, $arr2); 
	}
	
	echo var_dump($arr_actedmovies);

			//Call a function for showin the tittles in chronological order (create a function that compares dates in another .php file)
			//echo the result to the .html site
			
	//to remember
	//echo '<li>'. $movieRole->getMovieTitle() .' (realese: '. $movieRole->getMovieReleaseDate() .')</li>'; - line 34
	//echo '<li>'. $person->getName() .' (<a href="https://www.themoviedb.org/person/'. $person->getID() .'">'. $person->getID() .'</a>)</li>'; - line 21
?>
