/*initializes the main tabs*/
function createTabs() {
	console.log("create the tabs");
	$(function() {
        $("#tabs").tabs();
    });
}

/*sets the main tabs*/
function setTabs() {
	$("#my-poems-btn").click(function() {
		console.log("you clicked my poems");
		//$.ajax({
    	//	type: 'POST',
    	//	url: "/poems/my_poems",
    	//	success: function(response) {
    	//	},
    	//	data: {
    	//	},
    		//dataType: 'xml',
    	//});
	});
}