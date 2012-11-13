/*store noun list*/
var nouns = [
	"winter",
	"haze"
];

/*generates noun draggables*/
function generateNouns() {
	jQuery.each(nouns, function(index, value) {
		//console.log(this);
		$("#nouns-content").append("<div id='' class='noun draggable'>" + this + "</div>");
	});
}