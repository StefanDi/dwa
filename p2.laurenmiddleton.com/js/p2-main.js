$(document).ready(function() {

	setNavHover();
	styleClickedNavTab();
	switchNavTabs();
	
	
	$("#register-link").click(function(event) {
		event.preventDefault(); //prevents reloading of the page
		$("#registration-container").show();
	});
	
	//this isn't working correctly
	$(".follow-link").click(function(event) {
		//event.preventDefault(); //prevents reloading of the page
		$.ajax({
			type: 'POST',
			url: '/posts/users',
			beforeSend: function() {
			},
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
			data: {
			},
		});
	});
	
	
	//refresh only My Profile guts when post is added
	//this isn't currently working properly - maybe I have to remove the url action from the button and put it here in the ajax instead
	$("#add-post-submit").click(function(event) {	
		$.ajax({
			type: 'POST',
			url: '/posts/my_posts',
			beforeSend: function() {
			},
			success: function(response) {
				$('#my-posts-container').html(response);
			},
			data: {
			},
		});
	});
	
	
});