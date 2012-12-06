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
		//load poem comments
		//$.ajax({
		//	type: 'POST',
		//	url: 
		//});
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

}); //end document ready