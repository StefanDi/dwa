$(document).ready(function() {
	
	//generate words
	generateNouns(nouns);
	generateVerbs(verbs);
	generateAdj(adj);
	generateHelpers(helpers);
	
	$(".accordion-btn").hover(function() {
		$(this).addClass("accordion-btn-hover");
	}, function() {
		$(this).removeClass("accordion-btn-hover");
	});
	
	$(".accordion-btn").click(function() {
		//find and store id of the clicked btn
		var id = $(this).attr("id");
		//store id of clicked buttons content div
		var content = "#" + id + "-content";
		console.log(content);
		var display = $(content).css("display");
		console.log(display)
		//if clicked btn's content isn't open already...
		if(display = "none") { //IF STATEMENT CURRENTLY BROKEN
			//hide open content div
			$(".accordion-content").hide("blind", 1000);
			//show the content div that corresponds to the clicked btn
			$("#" + id + "-content").show("blind", 1000);
			console.log("the if statement was run");
		}
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
		opacity: 0.35,
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

}); //end document ready