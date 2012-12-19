$(document).ready(function() {
	
	//console.log("login js works!");
	
	/*set Log In btn*/
	$("#login-submit").click(function(event) {
		//prevent default
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/users/p_login',
			success: function(response) {
				//console.log(response);
				if(response == "fail") {
					//hide any other messages
					$("#reg-result").hide();
					$("#reg-error").hide();
					//clear reg inputs
					$("#reg-field").val("");
					var msg = "Incorrect email and password combination. Please try again.";
					$("#login-result").html(msg).show();
				}
				else if(response == "pass") {
					location.href = "/poems/index";
				}
			},
			data: {
                email: $('#login-email').val(),
                password: $('#login-pw').val(),
            },
		});
	});
	
	/*set Register btn*/
	$("#reg-submit").click(function() {
		//console.log("you clicked register");
		//prevent default
		event.preventDefault();
		//check for valid input
		var firstVal = $("#reg-first").val();
		var lastVal = $("#reg-last").val();
		var emailVal = $("#reg-email").val();
		var passVal = $("#reg-pw").val();
		if((firstVal == "") || (lastVal == "") || (emailVal == "") || (passVal == "")) {
			//hide any errors
			$("#reg-error").hide();
			$("#login-result").hide();
			//clear login inputs
			$(".login-input").val("");
			//show the reg error
			$("#reg-error").show();
		}else {
			//console.log("else statement entered");
			$.ajax({
				type: 'POST',
				url: '/users/p_signup',
				success: function(response) {
					//clear the inputs
					$(".reg-field").val("");
					//hide any errors
					$("#reg-error").hide();
					$("#login-result").hide();
					//clear login inputs
					$(".login-input").val("");
					//show a success message
					$("#reg-result").html(response).show();
				},
				data: {
                   first_name: $('#reg-first').val(),
                   last_name: $('#reg-last').val(),
                   email: $('#reg-email').val(),
                   password: $('#reg-pw').val(),
                },
			});
		}
		
	});

}); //end document ready