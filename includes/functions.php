<?php

function getComments($pdo, $post_id) {
    
    $statement = $pdo->prepare(
        "SELECT * FROM comments 
       WHERE post_id = :post_id");
    
        $statement->execute([
            ":post_id"     => $post_id,
        ]);
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $comments;
}

function getSinglePost($pdo) {
  /*  // Replace 1 with $_GET later
    $id= 1;
   
    //Prepare the database
    $single_post = $pdo->prepare('SELECT * FROM posts WHERE id = :id');

    $single_post->execute([

        'id' => $id,
    
    ]);

    $fetched_post = $single_post->fetch();
    //Errorchecking
   if (isset($fetched_post["id"])) {
    var_dump($fetched_post["id"]);
   } else {
     header('location: ../index.php?=kebabfail');
   }
   var_dump($fetched_post["title"]);*/
}

function test_input($data) // exempel

{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Ulrica function

function singlePost($pdo, $post_id, $slug){
    $statement = $pdo->prepare(
    "SELECT posts.id, posts.title, posts.description, posts.created_at, posts.image AS image_id, images.image AS image, post_category.prod_category_id AS category_id, product_category.category AS category_name
    FROM posts
    JOIN images
    ON images.id = posts.image
    JOIN post_category
    ON post_category.post_id = posts.id
    JOIN product_category
    ON product_category.category_id = post_category.prod_category_id
    WHERE posts.id = :post_id;
    AND posts.slug = :slug");

    $statement->execute([
        ":post_id"     => $post_id,
        ":slug"     => $slug
    ]);
    $single_post = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $single_post;
}

function excerpt($string, $post_id, $post_slug){
    $string = strip_tags($string);
    if (strlen($string) > 30) {

        // truncate string
        $stringCut = substr($string, 0, 40);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= "... <a href='single_post.php?$post_id=$post_slug'>Read More</a>";
    }

    return $string;
}

//Remove image from database and folder
if(isset($_GET['remove_image'])){
	$image_id = $_GET['remove_image'];

	$statement = $pdo->prepare("SELECT image FROM images WHERE id = :image_id");
	
	$statement->execute([
		":image_id"     => $image_id,
	]);
	$image_location = $statement->fetchAll(PDO::FETCH_ASSOC);

	unlink("../".$image_location[0]['image']);

	$statement = $pdo->prepare("DELETE FROM images WHERE id = :image_id");
	$statement->execute([
		":image_id"     => $image_id,
	]);

	header("Location: ?");	
}

//Remove specific post from database
if(isset($_GET['remove_post'])){
	$post_id = $_GET['remove_post'];

	$statement = $pdo->prepare(
        "DELETE FROM posts WHERE id = :post_id;
        
        DELETE FROM post_category WHERE post_id = :post_id;

        DELETE FROM comments WHERE post_id = :post_id;");
	$statement->execute([
		":post_id"     => $post_id,
	]);

	header("Location: main_page.php");
}

//Remove specific comment from database
if(isset($_GET['remove_comment'])){
	$comment_id = $_GET['remove_comment'];

	$statement = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
	$statement->execute([
		":comment_id"     => $comment_id,
	]);

	header("Location: ?" . $_GET['post_id'] . "=" . $_GET['slug']);	
}

//slut ulrica function