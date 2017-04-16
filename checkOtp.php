<?php
	include 'config.php';
	if(isset($_GET['number'])){
		$ob=new Task;
		$num=$_GET['number'];
		$query="select otp from otp where number='$num'";
		$res=$ob->query($query);
		if($res){
			$result=mysqli_fetch_assoc($res);
			echo $result['otp'];
		}
	}
?>