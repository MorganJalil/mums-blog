<?php

function getAllComments($pdo) {
    $comments = [];
    $database_comments = $pdo->query('SELECT * FROM comments')->fetchall();
    foreach ($database_comments as $comment) {
      $comments[$comment['content']] = $comment;
    }

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

//slut ulrica function