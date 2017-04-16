<!DOCTYPE HTML>
<html>
<head>
<title>Suggestion</title>
<?php
 require_once("headincludes.php"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<?php include("config.php"); ?>
<?php
	$ref_no=1000;
	$obj=new Task;
	$form_type=$_POST['form_type'];
	if($form_type=='suggestion'){
		$query="select max(ref_no) as ref_no from suggestions where cons_id='$cons_id'";
	}
	else if($form_type=='feedback'){
		echo 'hi';
		$query="select max(ref_no) as ref_no from feedbacks where cons_id='$cons_id'";
	}
	else if($form_type=='enquiry'){
		$query="select max(ref_no) as ref_no from enquiry where cons_id='$cons_id'";
	}
	$res=mysqli_query($obj->con,$query);
	$result=mysqli_fetch_assoc($res);
	if($result['ref_no'] !=0){
		$ref_no = $result['ref_no']+1;
	}
	echo $_POST['form_type'];
?>
<!-- content -->
<?php
	if(isset($_POST['email'])){
		$fname=$_POST['fname'];			
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$number=$_POST['number'];
		$subject=$_POST['subject'];
		$details=$_POST['details'];
		$form_heading='';
		if($form_type=='suggestion'){
			$sugQuery="INSERT INTO `suggestions`(`cons_id`, `ref_no`, `firstname`, `lastname`, `email`, `gender`, `subject`, `details`, `number`) VALUES ('$cons_id','$ref_no','$fname','$lname','$email','$gender','$subject','$details','$number')";

			$form_heading='Suggestion';
		}
		else if($form_type=='feedback'){
			$sugQuery="INSERT INTO `feedbacks`(`cons_id`, `ref_no`, `firstname`, `lastname`, `email`, `gender`, `subject`, `details`, `number`) VALUES ('$cons_id','$ref_no','$fname','$lname','$email','$gender','$subject','$details','$number')";

			$form_heading='Feedback';
		}
		else if($form_type=='enquiry'){
			$sugQuery="INSERT INTO `enquiry`(`cons_id`, `ref_no`, `firstname`, `lastname`, `email`, `gender`, `subject`, `details`, `number`) VALUES ('$cons_id','$ref_no','$fname','$lname','$email','$gender','$subject','$details','$number')";

			$form_heading='Enquiry';
		}
		mysqli_query($obj->con, $sugQuery);
	}
?>
<div class="container">
	<div class="main">
		<div class="center-block message">
			<p>Thank you, <?=$form_heading?> successfully submitted.</p>
			<p>Please note down your reference number is <?php echo $ref_no;?>.</p>
		</div>
	</div>
</div>
<!-- footer_top -->
<?php require_once("footer.php"); ?>
<!-- footer -->
</body>

</html>