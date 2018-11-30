<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <title>Document</title>
</head>
<body>
    
<a href="views/register_user.php">Register</a>

<?php 
    include 'includes/bootstrap_js.php';
include 'includes/database_connection.php';

//hämtar alla post från admin,

$request = $pdo->prepare('SELECT users.username, posts.created_at, posts.title, posts.body FROM posts INNER JOIN users ON posts.created_by = users.user_id AND users.admin = 1 AND admin = 1; ');

$request->execute();

$posts = $request->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $index => $post) { ?>

    <?= $post['title'] ?>
    <?= $post['username'] ?>
    <?= $post['created_at'] ?>
    <?= $post['body'] ?>

<?php
}

//print_r($posts); //

?>

</body>
</html>