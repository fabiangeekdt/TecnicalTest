var request;

$(document).ready(function(){
	$('#search_movies').click(function(e){
		
		//stop the form from being submitted
		e.preventDefault();
		
		//declare the variables send from the page
		var actor = $('#actor').val();
		var error = false;
		
		//clean the result div to show the next result
		$('#result').html('');
		
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
		
		if($.trim(actor) == ''){
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
			
			//get the URL from the window			
			var baseURL = window.location.protocol + "//" + window.location.host + "/";

			var serializeData = $("#search_form").serialize();
			
			$.ajax({
				url: baseURL + "AlertLogicTest/Controller/SearchActorByMovie.php",
				type: "post",
				data: serializeData,
				success: function(response, textStatus, jQxhr)
    			{
        			$('#result').html(response);
					$('#search_movies').attr({'disable' : 'true', 'value' : 'Search'});
    			},
    			error: function (jqXHR, textStatus, errorThrown)
    			{
 					$s('#result').html("jqXHR: " + jqXHR + "textStatus: " + textStatus + "err: " + errorThrown);
				}
			});	
		}
	});
});