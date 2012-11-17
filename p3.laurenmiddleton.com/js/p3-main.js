$(document).ready(function() {
	
	//generate words
	generateNouns(nouns);
	generateVerbs(verbs);
	generateAdj(adj);
	generateHelpers(helpers);
	
	
	
	/*sets accordion hover*/
	$(".accordion-btn").hover(function() {
		$(this).addClass("accordion-btn-hover");
	}, function() {
		$(this).removeClass("accordion-btn-hover");
	});
	
	/*sets accordion btn click*/
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
	
	/*sets word hover*/
	//$(".word").hover(function() {
	//	//store original background color
	//	var color = $(this).css("background-color");
	//	console.log (color);
	//	$(this).css("background-color", "white");
	//	}, function() {
	//	$(this).css("background-color", color);
	//});
	
	/*sets word click*/
	$(".word").click(function() {
		//store a clone of the clicked element
		var word = $(this).clone();
		console.log(word);
		//append the clone to the canvas
		$(word).appendTo("#canvas").css("position", "absolute").addClass("placed draggable");
		//enable dragging for the cloned word
		setDraggable(word);
		//setPendingDelete(this);
		//setDeselectDelete(this);
	});
	
	/*sets clear btn*/
	$("#clear-btn").click(function() {
		$(".placed").remove();
	});
	
	
	
	
	//$("#canvas").droppable( {
	//	accept: ".word",
	//	activeClass: "ui-state-hover",
    //   hoverClass: "ui-state-active",
	//	drop: function() {
	//		$(".dragging").addClass("dropped").removeClass("dragging").appendTo("#canvas").css("position", "absolute");
	//		//alert("dropped!");
	//	},
	//	tolerance: "fit",
	//});
	
	//$("#nouns-content").droppable( {
	//	accept: ".noun",
	//	activeClass: "ui-state-hover",
    //    hoverClass: "ui-state-active",
	//	drop: function() {
	//		$(".dragging").removeClass("dragging").removeClass("dropped").css("position", "static").appendTo("#nouns-content");
	//		//alert("dropped!");
	//	},
	//	tolerance: "fit",
	//});
	
	$("#trash").droppable( {
		accept: ".draggable",
		//activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
		drop: function() {
			$(".dragging").removeClass("dragging").addClass("dropped").remove();
			console.log("dropped!");
		},
		tolerance: "pointer",
	});

}); //end document ready