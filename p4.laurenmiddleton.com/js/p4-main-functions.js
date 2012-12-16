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
		//load the comments
		loadComments(id);
		//store the id of the comments container
		var container = "#poem" + id + "-comments-container";
		//show comments container
		$(container).show();  
	});
	
	/*sets comment submit btns on my poems page*/
	$(".my-poem-comment-submit-btn").live("click", function(event) {
		//prevent page reload
		event.preventDefault();
		
		//grab poem id
		var id = $(this).attr("href");
		
		//build url
		var url = "/poems/p_comment/" + id;
		
		//grab id of comment input
		var commentInputID = "#comment-input-poem" + id;
		
		//store the id of the comments parent
		var parent = "#poem" + id + "-comments-parent";
		
		$.ajax({
			type: 'POST',
			url: url,
			success: function(response) {
				//reload the comments
				loadComments(id);
				//show the comments parent (in case its closed)
				$(parent).show();
				//clear the input box
				$(commentInputID).val("");
			},
			data: {
				content: $(commentInputID).val(),
			},
		});
	});
	
	/*sets delete poem btns*/
	$(".delete-poem-btn").live("click", function(event) {
		//prevent page reload
		event.preventDefault();
		//create warning dialog
		//grab poem id
    	var id = $(this).attr("href");
    	console.log(id);
		$("#delete-poem-dialog").dialog({
    		resizable: false,
    		modal: true,
    		autoOpen: false,
    		buttons: {
    			"OK": function() {
    				console.log("ok button clicked");
    				//build poem url
    				var url = "/poems/delete/" + id;
    			
    				$.ajax({
    					type: 'POST',
    					url: url,
    					success: function(response) {
    						//reload My Poems
    						loadMyPoems();
    						//reset the dialog
    						$("#delete-poem-dialog").dialog("destroy");
    					},
    				});
    			
    				$(this).dialog("close");
    			},
    			"Cancel": function() {
    				$(this).dialog("close");
    			},
    		},
    	});
    	//open warning dialog
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