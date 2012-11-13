/*store word lists*/
var nouns = ["honey", "horse", "spark", "diamond", "swirl", "bell", "hotel", "girl", "mother", "father", "siren", "tear", "waitress", "icicle", "aquarium", "parasol", "carbon", "doughnut", "merman",	"winter", "spring", "pancake", "bliss", "ocean", "voodoo", "time", "leather", "blood", "rose", "cloud"];

var verbs = ["cool", "take", "resist", "shatter", "walk", "paint", "carry", "fly", "want", "caught", "riot", "love", "smell", "said", "take", "feed", "sleep", "linger", "fear", "grow", "swim", "save", "wait", "learn", "kneel", "get", "touch", "can", "judge", "feel", "stole", "disappear"];

/*generates noun draggables*/
function generateNouns(wordList) {
	$.each(wordList, function(index, value) {
		//console.log(this);
		$("#nouns-content").append("<div id='' class='noun draggable'>" + this + "</div>");
	});
}

/*generates verb draggables*/
function generateVerbs(wordList) {
	$.each(wordList, function(index, value) {
		$("#verbs-content").append("<div id='' class='verb draggable'>" + this + "</div>");
	});
}