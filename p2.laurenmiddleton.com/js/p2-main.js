$(document).ready(function() {

	setNavHover();
	styleClickedNavTab();
	switchNavTabs();
	
	
	$("#register-link").click(function(event) {
		event.preventDefault(); //prevents reloading of the page
		$("#registration-container").show();
	});
	
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
	
	$(".delete-post-btn").click(function(event) {
		event.preventDefault(); //prevents reloading of the page
		
		var currentId = $(this).attr('id');
		
		$.ajax({
			type: 'POST',
			url: '/posts/delete/$currentId',
			beforeSend: function() {
			},
			success: function(response) {
				$('#my-posts-container').html(response);
			},
			data: {
			},
		});
	});
	
	
	//refresh only My Profile guts when post is added
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