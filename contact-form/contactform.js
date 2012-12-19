$(document).ready(function() {

	//click of form bottom
	$("#contact-button").click(function(){
		$(this).hide(); 
		$("<img src='wp-content/themes/THEMES_NAME/images/loader.gif' class='loader' />").appendTo("#contact");
	  
		var timer = 2000;
		
		//associo variabili generali
		var name = $("#name").val();
		var message = $("#message").val();
		var email = $("#email").val();
		var object = $("#object").val();
		var privacy = $("#privacy").attr('checked');
		
		//pattern email
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
		if(!emailReg.test(email)) {

			$("#contact-button").show(); 
			$("<div id='errori'></div>").appendTo("#contact").html("<span>Error.. Check your email</span>").delay(2000).fadeOut(timer);
			$(".loader").hide();
		} 
		else if(privacy != "checked"){
			alert("You must check privacy and guide lines!");
			$("#contact-button").show();
			$(".loader").hide();
		} 
		else if(name == "" || email == "" ){	
			$("#contact-button").show(); 
			$("<div id='errori'></div>").appendTo("#contact").html("<span>Fill the field with (*)!</span>").delay(2000).fadeOut(timer);
			$(".loader").hide();
		} //if there are errors
		
		else{ //if every field is filled
			//call to ajax
			$.ajax({
				type: "POST",
				url: "wp-content/themes/THEMES_NAME/contact-form/mailer.php",

				//the form sends data to engine
				data: "name=" + name + "&email=" + email  + "&message=" + message + "&object=" + object,
				dataType: "html",

				success: function(msg){
					$(".loader").hide();
					$("<div id='risultato'></div>").appendTo("#contact").html("<span>The email is been sent!</span>").delay(3000).fadeOut(timer);
					$("#contact-button").delay(2000).fadeIn(); 
				},
	  
	  			error: function(){
					alert("Error..."); 
      				}
			});
		}//else
	
	}); //end form
});
