$(document).ready(function(){
	$('#search_movies').click(function(e){
		
		//stop the form from being submitted
		e.preventDefault();
		
		//declare the variables send from the page
		var actor = $('#actor').val();
		var error = false;
		
		if(actor.length == 0)
			error = true;
			
		//Validate if there's empty variables	
		if(error == false){
			//disable the Search button to avoid spamming
			//also change the button text to searching...
			$('#search_movies').attr({'disable' : 'true', 'value' : 'Searching...'});
			
			$.post("SearchActorByMovie.php", $("#search_form").serialize(), function(result){
					if(result == 'error'){
						window.alert("can't Search in this moment");
					}
				}
		}
	});
});