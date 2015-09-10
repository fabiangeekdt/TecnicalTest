<?php
/**
 * 	This php file handles all the operation for returning 
 *	the movie info data as requested 
 *
 * 	@author Fabian Moreno
 * 	@version 0.1
 * 	@date 08/09/2015	
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */
	header("access-control-allow-origin: *");

	include("init.php");
	include("class/tmdb-api.php");
	include("class/OrderItem.php");
	include("class/Viewer.php");
	
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
	
	if(empty($actorid)){
			$htmlout = new Viewer();
			echo $htmlout->getEchoNoResults(1);
	}
	else{	 		
		//get the Actor 
		$person = $tmdb->getPerson($actorid);		
		//Get all the movie roles
		$movieRoles = $person->getMovieRoles();		
		//validate if the actor has a movies stored in the database
		if(count($movieRoles) > 0){
		//get all the movies tittle and release date in an array
		foreach($movieRoles as $movieRole){
			//save records in an array
			$arr2["movietitle"] = $movieRole->getMovieTitle();
			$arr2["releasedate"] = $movieRole->getMovieReleaseDate();
			array_push($arr_actedmovies, $arr2); 
		}
		}
		else{
			$htmlout = new Viewer();
			echo $htmlout->getEchoNoResults(2);
		}
		
		//Instatie OrderItem for ordering the array movie info data
		$order = new OrderItem($arr_actedmovies);
		//Call a function for showing the tittles in chronological order
		$descending_array = $order->getorder();
		
		//echo the result to the .html site
		$htmlout = new Viewer();
		echo $htmlout->getEchoResults($descending_array);
		//use it just for testing issues
		//echo var_dump($descending_array);
	}
?>
