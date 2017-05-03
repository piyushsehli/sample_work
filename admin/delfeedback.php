<?php
	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();


	$obj->connect();
	$id = $_GET["id"];
	$query = "delete from feedbacks where ref_no=".$id;
	mysqli_query($obj->con,$query);
	
	header("location:feedbacks.php");
?>