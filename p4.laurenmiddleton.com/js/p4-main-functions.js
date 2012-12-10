$(document).ready(function() {
	
	console.log("it works!");
	
	createTabs();
	setTabs();
	
	/*sets view poem btns*/
	$(".view-poem-btn").live("click", function(event) {
		//prevents anchor link page jumping
		event.preventDefault();
		//hide any open poem content
		$(".poem-content").hide();
		//show the clicked content
		var id = $(this).attr("href");
		$(id).show();
	});
	
	/*sets show comments btns*/
	$(".show-comments-btn").live("click", function(event) {
		//prevents anchor link page jumping
		event.preventDefault();
		//test
		console.log("show comments");
		//grab the id of the poem
		var id = $(this).attr("href"); 
		//store the id of the comments parent
		var parent = "#poem" + id + "-comments-parent";
		//store the url to be used for comment loading
		var url = "/poems/_poem_comments/" + id;
		//load the comments in the parent
		$.ajax({
			type: 'POST',
			url: url,
			success: function(response) {
				$(parent).html(response);
			},
		});
		//show comments parent
		$(parent).show();  
	});
	
	/*init delete poem dialog*/
	$("#delete-poem-dialog").dialog({
    	resizable: false,
    	modal: true,
    	autoOpen: false,
    	buttons: {
    		"OK": function() {
    			//grab url
    			var url = $(this).attr("href");
    			
    			$.ajax({
    				type: 'POST',
    				url: url,
    				success: function(response) {
    				},
    			});
    			
    			$(this).dialog("close");
    		},
    		"Cancel": function() {
    			$(this).dialog("close");
    		},
    	},
    });
	
	/*sets delete poem btns*/
	$(".delete-poem-btn").live("click", function(event) {
		//prevent page reload
		event.preventDefault();
		console.log("pink squirrel");
		//ask if sure
		$("#delete-poem-dialog").dialog("open");
	});
	
	/*sets follow/unfollow btns*/
	$(".follow-link").live("click", function(event) {
		//prevent page reload
		event.preventDefault();
		//get the href attribute of the clicked btn
		var href = $(this).attr("href");
		//ajax request
		$.ajax({
			type: 'POST',
			url: href,
			success: function(response) {
				loadAllUsers();
			},
		});
	});

}); //end document ready