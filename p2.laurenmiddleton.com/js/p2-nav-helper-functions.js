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
			url: '/nav/my_profile',
			success: function(response) {
				$('#tab-guts-container').html(response);
			}
		});
		
		$.ajax({
			type: 'POST',
			url: '/posts/my_posts',
			success: function(response) {
				$('#my-posts-container').html(response);
			}
		});
	});
	
	//show My Feed content
	$("#my-feed-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/posts/index',
			success: function(response) {
				$('#tab-guts-container').html(response);
			}
		});
	});
	
	//show My Posts content
	$("#my-posts-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/posts/my_posts',
			success: function(response) {
				$('#tab-guts-container').html(response);
			}
		});
	});
	
	//show My Follows content
	$("#my-follows-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/nav/my_follows/',
			success: function(response) {
				$('#tab-guts-container').html(response);
			}
		});
	});
	
	//show All Users content
	$("#all-users-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/posts/users',
			success: function(response) {
				$('#tab-guts-container').html(response);
			}
		});
	});
	
	//show Customize content
	$("#customize-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/nav/customize/',
			success: function(response) {
				$('#tab-guts-container').html(response);
			},
		});
	});

}