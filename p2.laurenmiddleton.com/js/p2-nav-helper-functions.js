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
	
	//show My Feed content
	$("#my-feed-link").click(function(event) {
		$.ajax({
			type: 'POST',
			url: '/nav/showMyFeed/',
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
			url: '/nav/showMyPosts/',
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
			url: '/nav/showMyFollows/',
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
			url: '/nav/showAllUsers/',
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
			url: '/nav/showCustomize/',
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