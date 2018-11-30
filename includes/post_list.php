<?php

//retrieve all post, joined users and posts to create a associative array list of posts.

$request = $pdo->prepare('SELECT users.username, posts.created_at, posts.title, posts.body FROM posts INNER JOIN users ON posts.created_by = users.user_id AND users.admin = 1 AND admin = 1; ');

$request->execute();

$posts = $request->fetchAll(PDO::FETCH_ASSOC);

