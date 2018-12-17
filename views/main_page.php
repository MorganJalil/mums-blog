<?php
session_start();
if (empty($_SESSION['username'])) {
    header("Location: ../index.php?error=please_login");
}

include '../includes/database_connection.php';
include '../includes/db_fetches.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
include '../includes/bootstrap_js.php';
?>

<!-- N A V . B A R -->

<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img class="d-inline-block navbarLogo" src="../images/Nav-logo.png"
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
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">Contact</a>
            </li>
        </ul>
        <a href="logout.php" class="form-inline my-2 my-lg-0 loginButton">
            <input class="form-control mr-sm-2" type="hidden" name="logout" placeholder="Logout"
                   aria-label="Logout button">
            <button class="btn btn-default my-2 my-sm-0 " type="submit">Log out</button></a>
            <div class="createPost"><?php if ($_SESSION["admin"] == 1) { ?><a href="create_post.php">Create Post</a><?php } ?>
            </div>
        </form>
    </div>
</nav>

<!--- H E A D E R  CONTENT--->

<header class="hero_header">
    <div class="inner_container">
        <img class="heroLogo" src="../images/logo_whr.svg">
    </div>
</header>

<!--- MAIN S E C T I O N  DIVIDER--->


<main class="container post_section_divider ">
    <div class="section_line">
        <span class="grey_line"></span>
        <span class="section_title"> latest feature </span>
        <span class="grey_line"></span>
    </div>

    <!--- FIRST SECTION--->

    <article class="row">
        <div class="col-12 latest_feature">
            <a href="single_post.php?<?= $latestPost['0']['id'] ?>=<?= $latestPost['0']['slug']; ?>">
                <img class="img-fluid latest_feature_image" src="../<?= $latestPost['0']['image']; ?>"
                     alt="article about interior"></a>
            <div class="first_textblock">
                <span class="latest_feature_title"><?= $latestPost['0']['title'] ?></span>
                <h6>By: <?= $latestPost['0']['username'] ?> </h6>
                <p><?= excerpt($latestPost['0']['description'], $latestPost['0']['id'], $latestPost['0']['slug']); ?></p>
            </div
        </div>
    </article>

    <!--- SECOND SECTION CONTENT--->

    <section class="secondSection">
        <div class="section_line">
            <span class="grey_line"></span>
            <span class="section_title"> highlights </span>
            <span class="grey_line"></span>
        </div>
        <?php for ($i = 0; $i < sizeof($all_posts); $i += 3) { ?>
            <div data-aos="fade-zoom-in" data-aos-duration="2500" class="row highlight_articles ">
                <div class="col-sm<?= ($i + 1 < sizeof($all_posts)) ? 6 : 12; ?> col-lg-6">
                    <div class="image-container">
                        <a href="single_post.php?<?= $all_posts[$i]['id']; ?>=<?= $all_posts[$i]['slug']; ?>"><img
                                    class="img-fluid" src="../<?= $all_posts[$i]['image']; ?>"></a>
                        <div class="text-block">
                            <h5><?= $all_posts[$i]['title']; ?></h5>
                            <div class="mobile_hidden">
                            <h6>By:<?= $all_posts[$i]['username'] ?></h6>
                            <p><?= excerpt($all_posts[$i]['description'], $all_posts[$i]['id'], $all_posts[$i]['slug']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($i + 1 < sizeof($all_posts)) { ?>
                    <div class="col-sm-6 col-lg-6">
                        <div class="image-container">
                            <a href="single_post.php?<?= $all_posts[$i + 1]['id']; ?>=<?= $all_posts[$i + 1]['slug']; ?>"><img
                                        class="img-fluid" src="../<?= $all_posts[$i + 1]['image']; ?>"></a>
                            <div class="text-block">
                                <h5><?= $all_posts[$i + 1]['title']; ?></h5>
                                <div class="mobile_hidden"><h6>By: <?= $all_posts[$i]['username'] ?></h6>
                                <p><?= excerpt($all_posts[$i + 1]['description'], $all_posts[$i + 1]['id'], $all_posts[$i + 1]['slug']); ?></p>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if ($i + 2 < sizeof($all_posts)) { ?>
                <div data-aos="fade-zoom-in" data-aos-duration="2500" class="row highlight_articles ">
                    <div class="col-12">
                        <div class="image-container">
                            <a href="single_post.php?<?= $all_posts[$i + 2]['id']; ?>=<?= $all_posts[$i + 2]['slug']; ?>"><img
                                        class="img-fluid" src="../<?= $all_posts[$i + 2]['image']; ?>"></a>
                            <div class="text-block">
                                <h5><?= $all_posts[$i + 2]['title']; ?></h5>
                                <div class="mobile_hidden">
                                <h6>Posted by: <?= $all_posts[$i]['username'] ?></h6>
                                <p><?= excerpt($all_posts[$i + 2]['description'], $all_posts[$i + 2]['id'], $all_posts[$i + 2]['slug']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </section>

</main>

<!--- F O O T E R  DIVIDER--->

<footer class="main_footer" role="contentinfo">
    <div class="footer_content">
    <address>
        <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>
    </address>
    <small>Copyright &copy;
        <time>2018</time>
    </small>
    </div>
</footer>
<script>
    AOS.init();
</script>

</body>
</html>