$(document).ready(function() {
	
	console.log("login js works!");
	
	/*set Log In btn*/
	$("#login-submit").click(function() {
		//prevent default
		//event.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/users/p_login',
			success: function(response) {
				//show an error message
				$("#login-result").html(response).show();
			},
			data: {
                first_name: $('#reg-first').val(),
                last_name: $('#reg-last').val(),
                email: $('#reg-email').val(),
                password: $('#reg-pw').val(),
            },
		});
	});
	
	/*set Register btn*/
	$("#reg-submit").click(function() {
		console.log("you clicked register");
		//prevent default
		event.preventDefault();
		//check for valid input
		var firstVal = $("#reg-first").val();
		var lastVal = $("#reg-last").val();
		var emailVal = $("#reg-email").val();
		var passVal = $("#reg-pw").val();
		if((firstVal == "") || (lastVal == "") || (emailVal == "") || (passVal == "")) {
			$("#reg-error").show();
		}else {
			console.log("else statement entered");
			$.ajax({
				type: 'POST',
				url: '/users/p_signup',
				success: function(response) {
					//clear the inputs
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