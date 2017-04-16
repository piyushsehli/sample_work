<!DOCTYPE HTML>
<html>
<head>
<title>Suggestion</title>
<?php require_once("headincludes.php"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<?php
	$otp = mt_rand(1,999999);
	echo $otp;
	$number=$_POST['number'];
	include('config.php');
	$obj=new task;
	$obj->saveForOtp($number, $otp);
?>
<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration container" style="padding:30px 0px">
			<form id="otp_form" method="post" action="success.php">
				<div class="col-md-4 col-md-offset-4">
					<p class="text-center">Fill the OTP that has been sent to your mobile number (SMS). Please fill the correct OTP.</p>
					<div class="registration_form">
						<div>
							<label>
								<input placeholder="otp:" id="otp" name="otp" type="text" tabindex="1" required autofocus>
							</label>
						</div>
						<div>
							<input type="button" onclick="checkOtp()" value="sign in" name="register-submit" id="register-submit">
						</div>
					</div>
					<div id="hidden_fields">
						<input type="hidden" name="form_type" value="<?= $_POST['form_type'] ?>"></input>
						<input type="hidden" name="fname" value="<?= $_POST['fname'] ?>"></input>
						<input type="hidden" name="lname" value="<?= $_POST['lname'] ?>"></input>
						<input type="hidden" name="email" value="<?= $_POST['email'] ?>"></input>
						<input type="hidden" name="gender" value="<?= $_POST['gender'] ?>"></input>
						<input type="hidden" name="number" id="number" value="<?= $_POST['number'] ?>"></input>
						<input type="hidden" name="subject" value="<?= $_POST['subject'] ?>"></input>
						<input type="hidden" name="details" value="<?= $_POST['details'] ?>"></input>
					</div>	
				</div>
				<div class="clearfix"></div>
			</form>
	</div>
	<!-- end registration -->
</div>
</div>
<script type="text/javascript">
function checkOtp(){
	var otp=$('#otp').val();
	var number=$('#number').val();
	$.ajax({
		url: 'checkOtp.php',
		type: 'get',
		data:{
			number: number
		},
		success:function(real_otp){
			if(real_otp==otp){
				$('#otp_form').submit();
			}
			else{
				alert('Wrong otp! Try again');
				$('#otp').val('');
			}
		}
	});
}
</script>
<!-- footer_top -->
<?php require_once("footer.php"); ?>
<!-- footer -->
</body>

</html>