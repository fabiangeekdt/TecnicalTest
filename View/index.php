<!DOCTYPE html>
<html>
	<head>
		<title>Movie Actors - WebSearch</title>
		<meta charset="utf-8"/>
		<meta name="Title" content="Actors WebSearch">
        <meta name="Author" content="Fabian A Moreno Ch.">
		<meta name="Subject" content="Tecnical Test Presentation">
		<!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/reveal.css">
		<!-- Scripts -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/SearchMovies.js"></script>	
	</head>
	<body style="background-color:lightgrey; ">
		<?php
			include("Viewer.php");
			$init_view = new Viewer();
			echo $init_view->onInit();			
		?>
		<div id="result">
		</div>
	</body>
</html>