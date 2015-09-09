<!DOCTYPE html>
<html>
	<head>
		<title>Movie Actors - WebSearch</title>
		<meta charset="utf-8"/>	
		<!-- Scripts -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/SearchMovies.js"></script>	
	</head>
	<body style="background-color:lightgrey; ">
		<!--
		<center>
			<form method="post" id="search_form" >
				<label style="font-size:300%">ACTOR's WEBSEARCH</label>
				</br></br>
				<label for="actor">Actor's name:</label>
				<input type="text" name="actor" id="actor"  placeholder="type the name of the actor you want to search."</input>
				</br></br>
				<input type="submit" id="search_movies" value="Search"</input>
			</form>
		</center>
		-->
		<?php
			include("Viewer.php");
			$init_view = new Viewer();
			echo $init_view->onInit();			
		?>
		<div id="result">
		</div>
	</body>
</html>