<?php
session_start();

require ('database_connection.php');

if(isset($_POST) & !empty($_POST)){
    $statement = $pdo->prepare(
		"INSERT INTO comments (content, post_id, created_by)
		VALUES (:content, :post_id, :created_by,);"
		);

		$statement->execute([
		":content"     => $_POST["content"],
		":post_id"     => $_POST["post_id"],
		":created_by"     => $_SESSION["created_by"],
        ]);	
        

}
