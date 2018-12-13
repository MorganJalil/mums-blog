<?php 

//Get all posts
$statement = $pdo->prepare(
    "SELECT posts.id, posts.title, posts.slug, posts.description, posts.image AS image_id, images.image AS image, post_category.prod_category_id AS category_id
    FROM posts
    JOIN images
    ON images.id = posts.image
    JOIN post_category
    ON post_category.post_id = posts.id");
    
    $statement->execute([
    ]);
    $all_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

//Get all images
$statement = $pdo->prepare("SELECT * FROM images");	
$statement->execute();
$images = $statement->fetchAll(PDO::FETCH_ASSOC);

//Get all categories
$statement = $pdo->prepare("SELECT * FROM product_category");	
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

