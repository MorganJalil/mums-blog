<?php
/**
 * Created by PhpStorm.
 * User: sherie
 * Date: 2018-12-14
 * Time: 13:58
 */


$request = $pdo->prepare('SELECT user.username, posts.slug, posts.created_at, posts.title, posts.description, posts.image AS image_id, images.image AS image, post_category.prod_category_id AS category_id 
FROM posts 
INNER JOIN user 
ON posts.created_by = user.user_id
INNER JOIN images 
ON images.id = posts.image
INNER JOIN post_category
ON post_category.post_id = posts.id
AND user.admin = 1
AND admin = 1; ');

$request->execute();

$posts = $request->fetchAll(PDO::FETCH_ASSOC);