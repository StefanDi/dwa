$(document).ready(function() {

	$("#word-accordion").accordion();
	
	counter = 0;
	
	$(".word").draggable( {
		//appendTo: "#canvas",
		containment: "#container",
		cursor: "move",
		helper: "clone",
		//snap: true,
		start: function() {
			$(this).addClass("dragged");
		},
		stop: function() {
			//$(this).removeClass("word").addClass("word-clone").appendTo("#canvas");
			$(this).draggable({
				containment: "#canvas",
				cursor: "move",
				stop: function() {
					$(this).addClass("ui.helper").appendTo("#canvas");
				},
			});
		},
	});
	
	//$(".word-clone").draggable( {
	//	containment: "#canvas",
	//	cursor: "move",
		
	//});
	
	$("#canvas").droppable( {
		accept: ".word",
		drop: function() {
			$(".dragged").removeClass("word dragged").addClass("word-clone dropped").appendTo("#canvas");
			alert("dropped!");
		},
		tolerance: "fit",
	});

}); //end document ready