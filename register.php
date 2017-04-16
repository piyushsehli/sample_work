<!DOCTYPE HTML>
<html>
<head>
<title>Registration</title>
<?php require_once("headincludes.php"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<!-- content -->
<?php 
	require("config.php");
	$obj=new Task();
	if(isset($_POST['register-submit'])){
		$ok=$obj->addUser();
		if($ok==true){
			echo "<script>alert('User registered successfully');</script>";
		}
		else{
			echo "<script>alert('Try again later.');</script>";
		}
	}
?>
<div class="container">
<div class="main">
	<h2 class="text-center form-heading"><i class="fa fa-users" style="color:#00405d;"></i> Registration</h2>
	<!-- start registration -->
	<div class="registration container" style="padding:30px 0px">
		<form id="form-sug" method="post" action="register.php">
		<div class="registration_left col-md-6">
		<input type="hidden" value="suggestion" name="form_type"></input>
		<h2>Personal Details</h2>
		
		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		</script>
		 <div class="registration_form">
				<div>
					<label>
						<input placeholder="first name:" id="fname" name="fname" type="text" tabindex="1" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="last name:" type="text" id="lname" name="lname" tabindex="2" required>
					</label>
				</div>
				
				<div class="sky-form">
					<div class="sky_form1">
						<ul>
							<li><label class="radio left"><input type="radio" name="gender" checked="" value="male"><i></i>Male</label></li>
							<li><label class="radio"><input type="radio" name="gender" value="female"><i></i>Female</label></li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div>
					<label>
						<input placeholder="contact number:" type="number" id="number" name="number" tabindex="4" required>
					</label>
				</div>
				
				<div>
					<label>
						<input type="text" onfocus="this.type='date'" placeholder="DOB" id="date" name="date" tabindex="4" required>
					</label>
				</div>				
				
				<div>
					<label>
						<input type="text" id="address" name="address" tabindex="" placeholder="address:" required>
					</label>
				</div>

				<div>
					<label>
						<input type="text" id="city" name="city" tabindex="" placeholder="city:"  required>
					</label>
				</div>

				<div>
					<label>
						<input type="text" id="cons" name="cons" tabindex="" placeholder="constituency:"  required>
					</label>
				</div>

				<div>
					<label>
						<input type="text" id="pincode" name="pincode" tabindex="" placeholder="pin code:"  required>
					</label>
				</div>
				
		</div>
	</div>
	<div class="registration_left col-md-6">
		<h2>Login Details</h2>
		
		 <div class="registration_form">
		 <!-- Form -->
				<div>
					<label>
						<input placeholder="email:" type="text" tabindex="5" id="email" name="email" required>
						<!-- <span class="text-danger">Error in field.</span> -->
					</label>
				</div>
				<div>
					<label>
						<input placeholder="password:" type="password" tabindex="5" id="password" name="password" required>
						<!-- <span class="text-danger">Error in field.</span> -->
					</label>
				</div>
				
					<!-- <label class="checkbox">type="checkbox" name="agree" id="agree" <a class="terms" href="#"> terms of service</a> <input type="checkbox" name="agree" id="agree"><i></i> </label> -->
					<label for="agree">I agree to the <a href="#">terms of service. </a> <input type="checkbox" style="margin-left: 0px; vertical-align:middle"  name="agree" id="agree"></input></label>
						


				<div>
					<input type="submit" value="Submit" name="register-submit" id="register-submit">
				</div>
				
			
			</div>
	</div>
	</form>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>

<!-- footer_top -->
<?php require_once("footer.php"); ?>
<!-- footer -->
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var $form = $("#form-sug"),
		$successMsg = $(".alert");
		$.validator.addMethod("letters", function(value, element) {
		  return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
		});
		$form.validate({
		  rules: {
		    fname: {
		      required: true,
		      minlength: 2,
		      letters: true
		    },
		    lname: {
		      required: true,
		      minlength: 2,
		      letters: true
		    },
		    email: {
		      required: true,
		      email: true
		    },
		    password: {
		    	required: true,
		    	minlength:5
		    },
		    number: {
		    	required: true,
		    	 minlength: 10, 
		    	 maxlength: 10,
		    	 digits: true
		    },
		    date: {
		    	required:true
		    },
		    address: {
		    	required:true	
		    },
		    city: {
		    	required:true
		    },
		    cons: {
		    	required:true
		    },
		    state: {
		    	required:true
		    },
		    pincode: {
		    	required:true
		    },
		    file: {
		    	required:true
		    },
		    agree:{
		    	required: true
		    }
		  },
		  messages: {
		    fname: "Please specify your name (only letters are allowed)",
		    lname: "Please specify your name (only letters are allowed)",
		    email: "Please specify a valid email address",
		    number: "Only digits are allowed (Max number of digits is 10)",
		    subject: {
		    	required: "Please specify the subject",
		    	minlength: "Min number of characters is 10"
		    },
		    details: {
		    	minlength:"Min number of characters are 10",
		    	maxlength: "Max number of characters are 1000",
		    },
		    agree: "Please agree to the terms"
		  },
		  
		});
	});
</script>
</html>