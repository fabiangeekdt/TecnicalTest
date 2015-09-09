var request;

$(document).ready(function(){
	$('#search_movies').click(function(e){
		
		//stop the form from being submitted
		e.preventDefault();
		
		//declare the variables send from the page
		var actor = $('#actor').val();
		var error = false;
		
		if(actor.length == 0){
			error = true;
			$('#actor_error').fadeIn(500);
		}else{
			$('#actor_error').fadeOut(500);
		}

		var patt1 = /\d/g;
		var result = actor.match(patt1);			
		if(result != null){
			error = true;
			$('#actor_error').fadeIn(500);
		}else{
			$('#actor_error').fadeOut(500);
		}
			
		//Validate if there's empty variables	
		if(error == false){
			//disable the Search button to avoid spamming
			//also change the button text to searching...
			$('#search_movies').attr({'disable' : 'true', 'value' : 'Searching...'});
			
			
			var serializeData = $("#search_form").serialize();
			
			$.ajax({
				url: "http://localhost/test/Controller/SearchActorByMovie.php",
				type: "post",
				data: serializeData,
				success: function(response, textStatus, jQxhr)
    			{
        			$('#result').html(response);
					$('#search_movies').attr({'disable' : 'true', 'value' : 'Search'});
    			},
    			error: function (jqXHR, textStatus, errorThrown)
    			{
 					window.alert("jqXHR: " + jqXHR + "textStatus: " + textStatus + "err: " + errorThrown);
				}
			});	
		}
		//if(error == true){
		//	window.alert("please fill the fills.");
		//}
	});
});