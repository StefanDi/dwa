/*store word lists*/
var nouns = ["honey", "horse", "spark", "diamond", "swirl", "bell", "hotel", "girl", "mother", "father", "siren", "tear", "waitress", "icicle", "aquarium", "parasol", "carbon", "doughnut", "merman",	"winter", "spring", "pancake", "bliss", "ocean", "voodoo", "time", "leather", "blood", "rose", "cloud"];

var verbs = ["cool", "take", "resist", "shatter", "walk", "paint", "carry", "fly", "want", "caught", "riot", "love", "smell", "said", "take", "feed", "sleep", "linger", "fear", "grow", "swim", "save", "wait", "learn", "kneel", "get", "touch", "can", "judge", "feel", "stole", "disappear"];

var adj = ["raspberry", "strange", "velvet", "little", "crazy", "northern", "cruel", "silent", "purple", "professional", "sweet", "black", "big", "precious", "orange", "silken", "vitriolic", "happy", "dead", "underwater", "gold", "lost", "close", "red", "good", "peeled", "digital", "immune", "familiar", "secret"];

var helpers = ["he", "she", "it", "was", "ing", "in", "at", "when", "is", "ed", "the", "a", "we", "us", "d", "her", "his", "our", "ly", "s"];

/*generates noun draggables*/
function generateNouns(wordList) {
	$.each(wordList, function(index, value) {
		//console.log(this);
		$("#nouns-content").append("<a id='" + value + "' class='word noun clickable'>" + this + "</a>");
	});
}

/*generates verb draggables*/
function generateVerbs(wordList) {
	$.each(wordList, function(index, value) {
		$("#verbs-content").append("<a id='" + value + "' class='word verb clickable'>" + this + "</a>");
	});
}

/*generates adj draggables*/
function generateAdj(wordList) {
	$.each(wordList, function(index, value) {
		$("#adj-content").append("<a id='" + value + "' class='word adj clickable'>" + this + "</a>");
	});
}

/*generates helper draggables*/
function generateHelpers(wordList) {
	$.each(wordList, function(index, value) {
		$("#helpers-content").append("<a id='" + value + "' class='word helper clickable'>" + this + "</a>");
	});
}


/*makes clicked words draggable*/
function setDraggable(clickedWord) {
	//create array of word children in canvas
	//var droppedIds = $.map($("#canvas > .placed"), function(n, i) {
	//	return n.id;
	//});
	//console.log(droppedIds);
	//make those children draggable
	//$.each(droppedIds, function(index, value) {
		//console.log(value);
		$(clickedWord).draggable( {
			containment: "#canvas",
			cursor: "move",
			//helper: "clone",
			start: function() {
				$(this).addClass("dragging");
			},
			stop: function() {
				$(this).removeClass("dragging");
				//$(this).draggable( {
				//	containment: "#canvas",
				//	cursor: "move",
				//});
			},
			//revert: "invalid",
			opacity: 0.35,
		});
	//});
}

//function setPendingDelete(clickedWord) {
	/*sets style of clicked word pending deletion*/
	//may need to use live click on this one
//	$("#canvas > .placed").click(function() {
//		console.log("placed clicked");
//		$(this).css("border", "solid 3px red");
//		$(this).addClass("pending-delete");
//		setDeselectDelete(this);
//	});
//}

//function setDeselectDelete(word) {
//	$(word).click(function() {
//		$(this).css("border", "solid 1px black");
//		setPendingDelete(word);
//	});
//}

/*find positions of each dropped element and store in an array*/
function createPositionsArray() {
	//create an array of the ids of the dropped elements
	var droppedIds = $.map($(".placed"), function(n, i) {
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
		//
		//if(posLeft)
	});
}

function sortWords() {
	var sort = $(".placed").tsort( {
	});
	console.log(sort);
}