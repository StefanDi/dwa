$(document).ready(function() {

	setNavHover();
	styleClickedNavTab();
	switchNavTabs();
	
	
	//show registration form when Register link is clicked
	$("#register-link").click(function(event) {
		event.preventDefault(); //prevents reloading of the page
		$("#registration-container").show();
	});
	
	//switch to All Users tab when Find Friends Here link is clicked
	$("#all-users-here-link").click(function(event) {
		//prevents reloading of the page
		event.preventDefault();
		
		//switch which tab is highlighted
			//remove selected class from previous tab
			$(".nav-link").removeClass("nav-link-selected");
			//add selected class to clicked tab
			$("#all-users-link").addClass("nav-link-selected");
		
		//load All Users guts into the tab guts container
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