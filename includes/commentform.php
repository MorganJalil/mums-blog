<?php
session_start();

var_dump($_POST);

require 'database_connection.php';

//check that POST  is set
if(isset($_POST) && !empty($_POST)){
    //insert comment to database with values from post 
    $statement = $pdo->prepare(
		"INSERT INTO comments (content, post_id, created_by)
		VALUES (:content, :post_id, :created_by);"
		);
        //Replace $_post created by with session later
		$statement->execute([
		":content"     => $_POST["content"],
		":post_id"     => $_POST["post_id"],
		":created_by"     => $_POST["created_by"],
        ]);	
        //Send user back to correct blogpost
        header("Location: ../views/single_post.php?" . $_POST['post_id'] . "=" . $_POST['slug']);

}
