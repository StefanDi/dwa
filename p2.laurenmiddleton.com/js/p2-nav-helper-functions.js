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
	$("#my-feed-link").click(function(event) {
		//hide all with tab-guts class
		$(".tab-guts").hide();
		//show the target div
		$("#my-feed-container").show();
	});
	
	$("#my-posts-link").click(function(event) {
		$(".tab-guts").hide();
		$("#my-posts-container").show();
	});
	
	$("#my-follows-link").click(function(event) {
		$(".tab-guts").hide();
		$("#my-follows-container").show();
	});
	
	$("#all-users-link").click(function(event) {
		$(".tab-guts").hide();
		$("#all-users-container").show();
	});
	
	$("#customize-link").click(function(event) {
		$(".tab-guts").hide();
		$("#customize-container").show();
	});
}