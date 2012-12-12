/*initializes the main tabs*/
function createTabs() {
	console.log("create the tabs");
	$(function() {
        $("#tabs").tabs();
    });
}

/*loads all users view*/
function loadAllUsers() {
	$.ajax({
    	type: 'POST',
    	url: "/poems/users",
    	success: function(response) {
    		$("#all-poets-content").html(response);
    	},
    });
}

/*loads my poems*/
function loadMyPoems() {
	console.log("loadmypoems was called");
	$.ajax({
    	type: 'POST',
    	url: "/poems/my_poems",
    	success: function(response) {
    		$("#my-poems-content").html(response);
    	},
    });
}

/*sets the main tabs*/
function setTabs() {
	
	$("#my-poems-btn").click(function() {
		console.log("you clicked my poems");
		loadMyPoems();
	});
	
	$("#stream-btn").click(function() {
		console.log("you clicked stream");
		$.ajax({
    		type: 'POST',
    		url: "/poems/stream",
    		success: function(response) {
    			$("#stream-content").html(response);
    		},
    	});
	});
	
	$("#all-poets-btn").click(function() {
		console.log("you clicked all poets");
		loadAllUsers();
	});
	
	$("#my-profile-btn").click(function() {
		console.log("you clicked my profile");
		$.ajax({
    		type: 'POST',
    		url: "/users/my_profile",
    		success: function(response) {
    			$("#my-profile-content").html(response);
    		},
    	});
	});
	
}