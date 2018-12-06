<?php 
session_start();
require '../includes/database_connection.php';

var_dump($_POST);

if(isset($_POST)){
	
	//Add $_POST info to posts DB
	$statement = $pdo->prepare(
	"UPDATE posts 
    SET title = :title, description = :description, image = :image
    WHERE id = :post_id;
    
    UPDATE post_category 
    SET prod_category_id = :post_id,
	WHERE post_id = :post_id;"
	);

	$statement->execute([
	":title"     => $_POST["title"],
	":description"     => $_POST["description"],
	":created_by"     => $_SESSION["user_id"],
	":image_id"     => $_POST["image_id"],
	":published"     => $_POST["published"],
	]);	
	
	//header("Location: ../index.php?");		
} 



?>