/*store word lists*/
var nouns = ["honey", "horse", "spark", "diamond", "swirl", "bell", "hotel", "girl", "mother", "father", "siren", "tear", "waitress", "icicle", "aquarium", "parasol", "carbon", "doughnut", "merman",	"winter", "spring", "pancake", "bliss", "ocean", "voodoo", "time", "leather", "blood", "rose", "cloud"];

var verbs = ["cool", "take", "resist", "shatter", "walk", "paint", "carry", "fly", "want", "caught", "riot", "love", "smell", "said", "take", "feed", "sleep", "linger", "fear", "grow", "swim", "save", "wait", "learn", "kneel", "get", "touch", "can", "judge", "feel", "stole", "disappear"];

var adj = ["raspberry", "strange", "velvet", "little", "crazy", "northern", "cruel", "silent", "purple", "professional", "sweet", "black", "big", "precious", "orange", "silken", "vitriolic", "happy", "dead", "underwater", "gold", "lost", "close", "red", "good", "peeled", "digital", "immune", "familiar", "secret"];

var helpers = ["he", "she", "it", "was", "ing", "in", "at", "when", "is", "ed", "the", "a", "we", "us", "d", "her", "his", "our", "ly", "s"];

/*generates noun draggables*/
function generateNouns(wordList) {
	$.each(wordList, function(index, value) {
		//console.log(this);
		$("#nouns-content").append("<div id='" + value + "' class='noun draggable'>" + this + "</div>");
	});
}

/*generates verb draggables*/
function generateVerbs(wordList) {
	$.each(wordList, function(index, value) {
		$("#verbs-content").append("<div id='" + value + "' class='verb draggable'>" + this + "</div>");
	});
}

/*generates adj draggables*/
function generateAdj(wordList) {
	$.each(wordList, function(index, value) {
		$("#adj-content").append("<div id='" + value + "' class='adj draggable'>" + this + "</div>");
	});
}

/*generates helper draggables*/
function generateHelpers(wordList) {
	$.each(wordList, function(index, value) {
		$("#helpers-content").append("<div id='" + value + "' class='helper draggable'>" + this + "</div>");
	});
}

/*find positions of each dropped element and store in an array*/
function createPositionsArray() {
	//create an array of the ids of the dropped elements
	var droppedIds = $.map($(".dropped"), function(n, i) {
		return n.id;
	});
	alert(droppedIds);
	
	//create empty variable to hold the string to be printed
	var poem = "";
	
	$.each(droppedIds, function(index, value) {
		var pos = $("#" + value).position();
		var posLeft = pos.left;
		var posTop = pos.top;
		console.log(posLeft);
		console.log(posTop);
		//if position is greater than final
	});
	
	//create an array of the positions of each id in the first array
	//$(".dropped").index()
	
}