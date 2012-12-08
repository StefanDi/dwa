/*initializes the main tabs*/
function createTabs() {
	console.log("create the tabs");
	$(function() {
        $("#tabs").tabs();
    });
}

/**/
function loadAllUsers() {
	$.ajax({
    	type: 'POST',
    	url: "/poems/users",
    	success: function(response) {
    		$("#all-poets-content").html(response);
    	},
    });
}

/*sets the main tabs*/
function setTabs() {
	
	$("#my-poems-btn").click(function() {
		console.log("you clicked my poems");
		$.ajax({
    		type: 'POST',
    		url: "/poems/my_poems",
    		success: function(response) {
    			$("#my-poems-content").html(response);
    		},
    	});
	});
	
	$("#all-poets-btn").click(function() {
		console.log("you clicked all poets");
		loadAllUsers();
	});
	
}