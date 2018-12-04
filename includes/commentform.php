<?php
require ('database_connection.php');

if(isset($_POST) & !empty($_POST)){
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$subject = mysqli_real_escape_string($connection, $_POST['subject']);

	$isql = "INSERT INTO comments (name, email, subject, status) VALUES ('$name', '$email', '$subject', 'draft')";
	$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
	if($ires){
		$smsg = "Your Comment Submitted Successfully";
	}else{
		$fmsg = "Failed to Submit Your Comment";
	}

}
