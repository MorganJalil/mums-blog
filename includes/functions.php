<?php

function getSinglePost($pdo) {
    $post_id = 1;
    $id= 1;
   //kolla om man kan ersätta 1 med ?
    $single_post = $pdo->prepare('SELECT * FROM posts WHERE id = :id');

    $single_post->execute([

        'id' => $post_id,
    
    ]);
    
    $fetched_post = $single_post->fetch();

   if (isset($fetched_post["id"])) {
    var_dump($fetched_post["id"]);
   } else {
     header('location: ../index.php?=kebabfail');
   }
   
    
    

}

//function getSinglePostCategory($pdo) {
   
    //$single_post = $pdo->prepare('SELECT category_id FROM post_category WHERE post_id = ');

    
     //$single_post;

//}