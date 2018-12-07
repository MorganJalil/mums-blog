<?php

function getSinglePost($pdo) {
    // Replace 1 with $_GET later
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
   var_dump($fetched_post["title"]);
}

function test_input($data) // exempel

{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

