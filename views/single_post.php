<?php

//Start session for comment and admin 
session_start();

//get database connection once
require_once '../includes/database_connection.php';
require_once '../includes/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <title>Document</title>
</head>
<body>
    <!--Load single post function-->
    <?php getSinglePost($pdo);?>
    
    <!--Display post image-->
    <img src="../<?=fetchArrayi['imgPath']?>" alt="Cool Post Image">
    <!--Display post title-->
    <h1>Title</h1>
    <!--Display post category-->
    <h2>Category</h2>
    <!--Display post date-->
    <h3>Date</h3>
    <!--Display post -->
    <p>Random post text</p>
    <!--Display comments with comment field and if admin display remove comment button-->
    <section class="comments">Comments</section>

<?php 
    include '../includes/bootstrap_js.php';
?>

</body>
</html>