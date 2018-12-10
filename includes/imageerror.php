<?php
$imageErr = "";

if(isset($_GET['error'])){
	if($_GET['error'] == "exist"){
		$imageErr = "Sorry, file already exists.";
	}

	if($_GET['error'] == "size"){
		$imageErr = "Sorry, your file is too large.";
	}

	if($_GET['error'] == "format"){
		$imageErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}

	if($_GET['error'] == "type"){
		$imageErr = "File is not an image.";
	}
}




