<?php
session_start();
require '../includes/database_connection.php';

var_dump($_POST);

if(isset($_POST)){

	//Create slug for post
	$slug = str_replace(" ", "_", $_POST["title"]);
	
	//Add $_POST info to posts DB
	$statement = $pdo->prepare(
	"INSERT INTO posts (title, slug, description, created_by, image, published)
	VALUES (:title, :slug, :description, :created_by, :image_id, :published);"
	);

	$statement->execute([
	":title"     => $_POST["title"],
	":slug"     => $slug,
	":description"     => $_POST["description"],
	":created_by"     => $_SESSION["user_id"],
	":image_id"     => $_POST["image_id"],
	":published"     => $_POST["published"],
	]);	
	
	$statement = $pdo->prepare("SELECT MAX(id) AS id FROM posts");	
	$statement->execute();
	$post_id = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$statement = $pdo->prepare(
	"INSERT INTO post_category (post_id, prod_category_id)
	VALUES (:post_id, :category_id);"
	);

	$statement->execute([
	":post_id"     => $post_id[0]["id"],
	":category_id"     => $_POST["category_id"],
	]);	
	//header("Location: main_page.php");		
} 

?>