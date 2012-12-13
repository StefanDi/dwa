$(document).ready(function() {
	
	console.log("login js works!");
	
	/*set Log In btn*/
	$("#login-submit").click(function() {

	});
	
	/*set Register btn*/
	$("#reg-submit").click(function() {
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
			$.ajax({
				type: 'POST',
				url: '/users/p_signup',
				success: function(response) {
					
				},
				//add form data in to get it working!
			});
		}
		
	});

}); //end document ready