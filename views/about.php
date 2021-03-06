<?php
session_start();
$_SESSION['user_id'] = 1;
$_SESSION['admin'] = 1;
if (empty($_SESSION['user_id'])) {
    header("Location: ../index.php?error=please_login");
}

include '../includes/database_connection.php';
include '../includes/db_fetches.php';
include '../includes/functions.php';
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
    <link rel="stylesheet" type="text/css" href="../css/about.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Millhouse</title>
</head>
<body id="about-page">


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

<!---  S E C T I O N  DIVIDER--->

<div class="container post_section_divider ">
    <div class="section_line">
        <span class="grey_line"></span>
        <span class="section_title"> millhouse </span>
        <span class="grey_line"></span>
    </div>
</div>
    <section class="container ">
        <div data-aos="fade-zoom-in" data-aos-duration="2300" class="row justify-content-center">
            <div class="col-10 card">
                <div class="about_text">
                    <h4>About us and our background</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </section>

<footer  class="main_footer" role="contentinfo">
    <address>
        <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>
    </address>
    <small>Copyright &copy;
        <time>2018</time>
    </small>
</footer>

<script>
    AOS.init();
</script>

</body>
</html>