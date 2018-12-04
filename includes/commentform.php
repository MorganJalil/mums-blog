<?php
require ('database_connection.php');

if(isset($_POST) & !empty($_POST)){
	$subject = mysqli_real_escape_string($connection, $_POST['subject']);

	$isql = "INSERT INTO comments (subject) VALUES ('$subject')";
	$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
	if($ires){
		$smsg = "Your Comment Submitted Successfully";
	}else{
		$fmsg = "Failed to Submit Your Comment";
	}

}
