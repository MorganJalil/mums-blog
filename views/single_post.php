<?php
//Start session for comment and admin 
session_start();

$_SESSION["admin"] = 1;

//get database connection once
require_once '../includes/database_connection.php';
require_once '../includes/functions.php';
include '../includes/db_fetches.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Millhouse</title>
</head>
<body id="main-page">
<?php
include '../includes/bootstrap_js.php';?>

<!-- N A V . B A R -->
<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="main_page_2.php"><img class="d-inline-block navbarLogo" src="../images/Nav-logo.png"
                                          alt="Millhouse logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar_options" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="#">Category<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">Contact</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 loginButton">
            <input class="form-control mr-sm-2" type="hidden" name="login" placeholder="Login"
                   aria-label="Login button">
            <button class="btn btn-default my-2 my-sm-0 " type="submit">Login</button>
        </form>
    </div>
</nav>
<main class="container">
    <!--Load single post function-->
    <?php 
    if(empty(key($_GET)) || empty($_GET[key($_GET)])){  ?>
    <div class="row no_post">
        <div class="col-12"> 
            <p>Oops, something went wrong!</p>  
        </div>    
    </div>
    <?php 
    } else { 
    $single_post = singlePost($pdo, key($_GET), $_GET[key($_GET)]);?> <br />
    
    <!--Display post image-->
    <img src="../<?=$single_post[0]['image'];?>" alt="Cool Post Image">
    <!--Display post title-->
    <h1><?=$single_post[0]['title'];?></h1><?php if($_SESSION["admin"] == 1){?><a href="edit_post.php?<?=key($_GET);?>=<?=$_GET[key($_GET)];?>">Edit post</a> <?php } ?>
    <!--Display post date-->
    <p><?=$single_post[0]['created_at'];?> |
    <!--Display post category-->
    <b>Category:</b> <?=ucfirst($single_post[0]['category_name']);?></p>
    <!--Display post -->
    <?=$single_post[0]['description'];?>
    

    <!--Set post and session for example-->
    <?php $_SESSION["user_id"] = "2";?>
    <!--Add comment form-->
    <div class="card col-5">
        <div class="card-title">Submit Your Comments</div>
        <div class="card-subtitle">
            <form method="POST" action="../includes/commentform.php">
        </div>    
            <div class="form-group">
                <!--insert post and session values to form-->
                <input type="hidden" name="post_id" id="single_comment" value='<?= key($_GET)?>' />
                <input type="hidden" name="slug" id="single_comment" value='<?= $_GET[key($_GET)]?>' />
                <input type="hidden" name="created_by" id="single_comment" value='<?= $_SESSION["user_id"]?>' />
                <label for="single_comment">Comment</label>
                <textarea id="single_comment" name="content" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>

    <?php
    $all_comments = getComments($pdo, key($_GET));


    foreach($all_comments as $allComment => $comment): ?>
        <div class="card col-5" >
            <p><?= $comment['created_by']; ?></p>
            <p><?= $comment['post_id']; ?></p>
            <p><?= $comment['content']; ?></p>
        </div>
    <?php endforeach; ?>
    
<?php 
    } //end else
    include '../includes/bootstrap_js.php';
?>
</main>

</body>
</html>