<?php
//Start session for comment and admin 
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../index.php?error=please_login");
}
//get database connection once
require_once '../includes/database_connection.php';
require_once '../includes/functions.php';
include '../includes/db_fetches.php';
include '../includes/bootstrap_js.php';

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
    <link rel="stylesheet" type="text/css" href="../css/single_post.css">
    <title>Millhouse</title>
</head>
<body id="single-post-page">

<!-- N A V . B A R -->
<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="main_page.php"><img class="d-inline-block navbarLogo" src="../images/Nav-logo.png"
                                                      alt="Millhouse logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar_options" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="categories.php">Category<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="contact.php">Contact</a>
            </li>
        </ul>
        <a href="logout.php" class="form-inline my-2 my-lg-0 loginButton">
            <input class="form-control mr-sm-2" type="hidden" name="logout" placeholder="Logout"
                   aria-label="Logout button">
            <button class="btn btn-default my-2 my-sm-0 " type="submit">Log out</button>
        </a>
    </div>
</nav>

<!--- H E A D E R  CONTENT--->

<header class="hero_header">
    <div class="inner_container">
        <img class="heroLogo" src="../images/logo_whr.svg">
    </div>
</header>

<!--- S E C T I O N DIVIDER--->


<main class="container post_section_divider ">
    <div class="section_line">
        <span class="grey_line"></span>
        <span class="section_title"> MILLHOUSE </span>
        <span class="grey_line"></span>
    </div>

    <!--- M A I N  CONTENT--->


    <article class="container">

        <!--Load single post function-->
        <?php
        if (empty(key($_GET)) || empty($_GET[key($_GET)])) { ?>
            <div class="row no_post">
                <div class="col-12">
                    <p>Oops, something went wrong!</p>
                </div>
            </div>
            <?php
        } else {
            $single_post = singlePost($pdo, key($_GET), $_GET[key($_GET)]); ?> <br/>
            <div class="row justify-content-center">
                <div class="col-sm-10 single-post">
                    <!--Display post image-->
                    <img src="../<?= $single_post[0]['image']; ?>" class="single-img img-fluid">
                </div>

                <!--Display post title-->
                <div class="first_textblock">
                    <h1 class="post-title"><?= $single_post[0]['title']; ?></h1><?php if ($_SESSION["admin"] == 1) { ?>
                        <a href="edit_post.php?remove_post=<?= key($_GET); ?>">Remove post</a> |
                        <a href="edit_post.php?<?= key($_GET); ?>=<?= $_GET[key($_GET)]; ?>">Edit post</a> <?php } ?>
                    <!--Display post date-->
                    <p><?= $single_post[0]['created_at']; ?> |
                        <!--Display post category-->
                    <p>Category : <?= ucfirst($single_post[0]['category_name']); ?> </p>
                </div>
                <div class="post-description">
                <!--Display post -->
                <p> <?= $single_post[0]['description']; ?></p>
            </div>

            </div>

            <!--Add comment form-->
            <div class="card col-sm-6">
                <div class="card-title">Submit Your Comments</div>
                <div class="card-subtitle">
                    <form method="POST" action="../includes/commentform.php">
                </div>
                <div class="form-group">
                    <!--insert post and session values to form-->
                    <input type="hidden" name="post_id" id="single_comment" value='<?= key($_GET) ?>'/>
                    <input type="hidden" name="slug" id="single_comment" value='<?= $_GET[key($_GET)] ?>'/>
                    <input type="hidden" name="created_by" id="single_comment" value='<?= $_SESSION["username"] ?>'/>
                    <label for="single_comment">Comment:</label>
                    <textarea id="single_comment" name="content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <?php
            $all_comments = getComments($pdo, key($_GET));


            foreach ($all_comments as $allComment => $comment): ?>
                <div class="card col-5">
                    <p>created by:<?= $comment['created_by']; ?></p>
                    <p>content: <?= $comment['content']; ?></p>
                    <!--IF ADMIN SÅ VISAS DENNA -->
                    <a href="?remove_comment=<?= $comment['id']; ?>&post_id=<?= key($_GET) ?>&slug=<?= $_GET[key($_GET)] ?>">Remove
                        comment</a>
                </div>
            <?php endforeach; ?>

            <?php
        } //end else
        ?>
    </article>
</main>
<footer class="main_footer" role="contentinfo">
    <div class="footer_content">
        <address>
            <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>

            <?php if ($_SESSION["admin"] == 1) {
                echo "logged in as ADMIN " . $_SESSION['username'];
            } else {
                echo "logged in as" . $_SESSION['username'];
            }
            ?>
        </address>
        <small>Copyright &copy;
            <time>2018</time>
        </small>
    </div>
</footer>
</body>
</html>