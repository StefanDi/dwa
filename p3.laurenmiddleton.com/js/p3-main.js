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
		//remove all word elements in canvas that still have class temp
			$(".temp").remove();
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
	
	/*sets noun clickable word hover*/
	//$(".noun").hover(function() {
	//	$(this).removeClass("noun");
	//	$(this).addClass("word-hover");
	//}, function() {
	//	$(this).removeClass("word-hover");
	//	$(this).addClass("noun");
	//});
	
	/*sets word click*/
	//$(".word").click(function() {
		//store a clone of the clicked element
	//	var word = $(this).clone();
	//	console.log(word);
		//append the clone to the canvas
	//	$(word).appendTo("#canvas").css("position", "absolute").removeClass("clickable").addClass("placed draggable");
		//enable dragging for the cloned word
	//	setDraggable(word);
		//setPendingDelete(this);
		//setDeselectDelete(this);
	//});
	
	$(".clickable").draggable( {
		containment: "#container",
		helper: 'clone',
		start: function(event, ui){
			//remove all word elements in canvas that still have class temp
			$(".temp").remove();
			$(ui.helper).addClass('temp');
		},
		stop: function(event, ui) {
			
			$(ui.helper).clone(true).removeClass('clickable').addClass('placed draggable').appendTo('#canvas');
			//setDraggable(ui.helper);
			$(".placed").draggable( {
				containment: "#canvas",
				cursor: "move",
				//helper: "clone",
				start: function() {
					//remove all word elements in canvas that still have class temp
					$(".temp").remove();
					$(this).addClass("trashable");
				},
				stop: function() {
					$(this).removeClass("trashable");
					//if(drop == "invalid") {
					//	$(ui.helper).remove();
					//}
					//$(this).draggable( {
					//	containment: "#canvas",
					//	cursor: "move",
					//});
				},
				//revert: "invalid",
				opacity: 0.35,
			});
		},
		revert: "invalid",
		opacity: 0.35,
	});
	
	/*sets clear btn*/
	$("#clear-btn").click(function() {
		$(".placed").remove();
	});
	
	
	
	
	$("#canvas").droppable( {
		accept: ".word",
		activeClass: "ui-state-hover",
    //  hoverClass: "ui-state-active",
		drop: function() {
	//		$(".dragging").addClass("dropped").removeClass("dragging").appendTo("#canvas").css("position", "absolute");
			$(".temp").addClass("dropped").removeClass("temp");
			//alert("dropped!");
			
		},
		tolerance: "fit",
	});
	
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
		accept: ".trashable",
		//activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
		drop: function() {
			//remove all word elements in canvas that still have class temp
			$(".temp").remove();
			$(".trashable").remove();
			console.log("dropped!");
		},
		tolerance: "pointer",
	});
	
	/*set up a printable version of the canvas*/
	//code modified from Card Generator
	$("#print-btn").click(function() {
		//remove all word elements in canvas that still have class dragging
			$(".temp").remove();
	
    	// Setup the window we're about to open            
        var print_window =  window.open('','_blank','');
        
        //hide the trash element
        $("#trash").hide();
                    
        // Grab the contents of the canvas
        var content = $('#canvas').html();
        
                        
        // Build the HTML content for that window
        var html = '<html>';
        html += '<head>';
        //html += '<link rel="stylesheet" href="p3-styles.css" type="text/css">';
        html += '</head>';
        html += '<body>';
        html += content;
        html += '</body>';
        html += '</html>';
               
        // Write to our new window
        print_window.document.write(html);
        
        //show the trash element again
        $("#trash").show();
                            
    });

}); //end document ready