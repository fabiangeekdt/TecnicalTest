var request;

$(document).ready(function(){
	$('#search_movies').click(function(e){
		
		//stop the form from being submitted
		if (e.defaultPrevented){}
		
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
			
			
			var serializeData = $("#search_form").serialize();
			
			request = $.ajax({
				url: "http://localhost/test/Controller/SearchActorByMovie.php",
				type: "post",
				data: serializeData,
				success: function(data, textStatus, jqXHR)
    			{
        			//data - response from server
					window.alert("it works.");
    			},
    			error: function (jqXHR, textStatus, errorThrown)
    			{
 					window.alert("dont works.");
				}
			});
			
		}
		if(error == true){
			window.alert("please fill the fills.");
		}
	});
});