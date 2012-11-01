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