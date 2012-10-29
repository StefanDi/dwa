//nav tab hover behavior
function setNavHover() {
	$("li.nav-link").hover(
		function() {
			$(this).addClass("nav-link-hover");
		},
		function() {
			$(this).removeClass("nav-link-hover");
		}
	);
}

//visually select clicked tab
function styleClickedNavTab() {
	$(".nav-link").click(function(event) {
		//remove selected class from previous tab
		$(".nav-link").removeClass("nav-link-selected");
		//add selected class to clicked tab
		$(this).addClass("nav-link-selected");
	});
}

//switch tab content
function switchNavTabs() {
	
	//show My Profile content
	$("#my-profile-link").click(function(event) {
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
	
	//show My Feed content
	$("#my-feed-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/posts/index',
			beforeSend: function() {
			},
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
			data: {
			},
		});
	});
	
	//show My Posts content
	$("#my-posts-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/posts/my_posts',
			beforeSend: function() {
			},
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
			data: {
			},
		});
	});
	
	//show My Follows content
	$("#my-follows-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/nav/my_follows/',
			beforeSend: function() {
			},
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
			data: {
			},
		});
	});
	
	//show All Users content
	$("#all-users-link").click(function(event) {
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
	
	//show Customize content
	$("#customize-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/nav/customize/',
			beforeSend: function() {
			},
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
			data: {
			},
		});
	});

}