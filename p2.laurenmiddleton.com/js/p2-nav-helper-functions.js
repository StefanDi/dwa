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