<?php

function getSinglePost($pdo) {
   
    $single_post = $pdo->prepare('SELECT * FROM posts WHERE id = ');

    $post_id = 
    
    return $single_post;

}

function getSinglePostCategory($pdo) {
   
    $single_post = $pdo->prepare('SELECT category_id FROM post_category WHERE post_id = ');

    
    return $single_post;

}