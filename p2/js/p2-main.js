$(document).ready(function() {

	setNavHover();
	styleClickedNavTab();
	switchNavTabs();
	
	
	$("#register-link").click(function(event) {
		event.preventDefault(); //prevents reloading of the page
		$("#registration-container").show();
	});
	
	
});