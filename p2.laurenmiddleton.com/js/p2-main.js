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
	
	
	//refresh only My Profile guts when post is added
$("#add-post-submit").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/nav/my_profile/',
			beforeSend: function() {
			},
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
			data: {
			},
		});
	});
	
	
});