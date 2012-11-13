$(document).ready(function() {
	
	//generate words
	generateNouns(nouns);
	generateVerbs(verbs);
	
	$(".accordion-btn").click(function() {
		//find and store id of the clicked btn
		var id = $(this).attr("id");
		//hide open content div
		$(".accordion-content").hide();
		//show the content div that corresponds to the clicked btn
		$("#" + id + "-content").show();
	});
	
	$(".draggable").draggable( {
		containment: "#container",
		cursor: "move",
		start: function() {
			$(this).addClass("dragging");
		},
		stop: function() {
			$(this).draggable( {
				containment: "#canvas",
				cursor: "move",
			});
		},
		revert: "invalid",
	});
	
	$("#canvas").droppable( {
		accept: ".draggable",
		activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
		drop: function() {
			$(".dragging").addClass("dropped").removeClass("dragging").appendTo("#canvas");
			//alert("dropped!");
		},
		tolerance: "fit",
	});
	
	//$("#word-accordion").accordion();
	
	//counter = 0;
	
	//$(".word").draggable( {
	//	//appendTo: "#canvas",
	//	containment: "#container",
	//	cursor: "move",
	//	helper: "clone",
	//	//snap: true,
	//	start: function() {
	//		$(this).addClass("dragged");
	//	},
	//	stop: function() {
	//		//$(this).removeClass("word").addClass("word-clone").appendTo("#canvas");
	//		$(this).draggable({
	//			containment: "#canvas",
	//			cursor: "move",
	//			stop: function() {
	//				$(this).addClass("ui.helper").appendTo("#canvas");
	//			},
	//		});
	//	},
	//});
	
	//$(".word-clone").draggable( {
	//	containment: "#canvas",
	//	cursor: "move",
		
	//});
	
	//$("#canvas").droppable( {
	//	accept: ".word",
	//	drop: function() {
	//		$(".dragged").removeClass("word dragged").addClass("word-clone dropped").appendTo("#canvas");
	//		alert("dropped!");
	//	},
	//	tolerance: "fit",
	//});

}); //end document ready