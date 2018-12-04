<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <title>Document</title>
</head>
<body>

<a href="views/register_user.php">Register</a>

<?php
session_start();
include 'includes/bootstrap_js.php';
include 'includes/database_connection.php';

if (isset($_SESSION['user_id'])) {

    $request = $pdo->prepare('SELECT users.username, posts.image, posts.created_at, posts.title, posts.body FROM posts INNER JOIN users ON posts.created_by = users.user_id AND users.admin = 1 AND admin = 1; ');

    $request->execute();

    $posts = $request->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as $post): ?>

    <?= $post['image'] ?>
    <?= $post['title'] ?>
    <?= $post['username'] ?>
    <?= $post['created_at'] ?>
    <?= $post['body'] ?>
    <?php endforeach; ?>

    <button><a class="logoutButton" href="views/logout.php">LOGGAUT</a></button>


<?php } else { ?>

    <form action="views/login.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit" name="login"> Log in
        </button>
    </form>

<?php } ?>


</body>
</html>