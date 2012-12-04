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

}); //end document ready