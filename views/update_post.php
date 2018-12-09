<?php 
session_start();
require '../includes/database_connection.php';

var_dump($_POST);

if(isset($_POST)){
	
	//Create slug for post
	$slug = str_replace(" ", "_", $_POST["title"]);
	
	//Add $_POST info to posts DB
	$statement = $pdo->prepare(
	"UPDATE posts 
    SET title = :title, slug = :slug, description = :description, image = :image_id
    WHERE id = :post_id;
    
    UPDATE post_category 
    SET prod_category_id = :category_id,
	WHERE post_id = :post_id;"
	);

	$statement->execute([
	":title"     => $_POST["title"],
	":slug"     => $slug,
	":description"     => $_POST["description"],
	":image_id"     => $_POST["image_id"],
	":category_id"     => $_POST["category_id"],
	":post_id"     => $_POST["post_id"],
	]);	
	
	//header("Location: ../index.php?");		
} 



?>