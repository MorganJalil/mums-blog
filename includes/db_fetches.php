<?php 

include 'database_connection.php';

//Get all posts
/*$statement = $pdo->prepare(
    "SELECT posts.id, posts.title, posts.slug, posts.description, posts.image AS image_id, images.image AS image, post_category.prod_category_id AS category_id
    FROM posts
    JOIN images
    ON images.id = posts.image
    JOIN post_category
    ON post_category.post_id = posts.id");
    
    $statement->execute([
    ]);
    $all_posts = $statement->fetchAll(PDO::FETCH_ASSOC);*/

$request = $pdo->prepare('SELECT users.username, posts.id, posts.slug, posts.created_at,  posts.created_by, posts.title, posts.description, posts.image AS image_id, images.image AS image, post_category.prod_category_id AS category_id 
FROM posts 
INNER JOIN users 
ON posts.created_by = users.user_id
INNER JOIN images 
ON images.id = posts.image
INNER JOIN post_category
ON post_category.post_id = posts.id
AND users.admin = 1
AND admin = 1  ');

$request->execute();

$all_posts = $request->fetchAll(PDO::FETCH_ASSOC);

//Get latest post

$query = $pdo->prepare('SELECT posts.title, slug, description, posts.id, created_by, images.image, users.username, posts.image AS image_id
FROM `posts` 
INNER JOIN users
ON posts.created_by = users.user_id
INNER JOIN images 
ON posts.image = images.id
ORDER BY created_at DESC
LIMIT 1');

$query->execute();

$latestPost = $query->fetchAll(PDO::FETCH_ASSOC);


//Get all images
$statement = $pdo->prepare("SELECT * FROM images");	
$statement->execute();
$images = $statement->fetchAll(PDO::FETCH_ASSOC);

//Get all categories
$statement = $pdo->prepare("SELECT * FROM product_category");	
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

