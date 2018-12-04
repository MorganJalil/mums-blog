<?php
session_start();
require '../includes/database_connection.php';

if(isset($_POST)){

    var_dump($_POST);
    var_dump($_SESSION);
    echo "<br>";
    echo "<br>";

    echo $_POST["title"] . "<br>";
    echo $_POST["description"] . "<br>";
    echo $_SESSION["user_id"] . "<br>";
    echo $_POST["image_id"] . "<br>";

		
        //Add $_POST info to posts DB
		$statement = $pdo->prepare(
		"INSERT INTO posts (title, description, created_by, image, published)
		VALUES (:title, :description, :created_by, :image_id, :published);"
		);

		$statement->execute([
		":title"     => $_POST["title"],
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
		//header("Location: ../index.php?");		
	} 

?>