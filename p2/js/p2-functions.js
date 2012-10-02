$(document).ready(function() {

	$("#register-link").click(function(event) {
		event.preventDefault(); //prevents reloading of the page
		$("#registration-container").show();
	});
	
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
	
	$("li.nav-link").hover(
		function() {
			$(this).addClass("nav-link-hover");
		},
		function() {
			$(this).removeClass("nav-link-hover");
		}
	);
	
});