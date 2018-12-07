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
            <button class="btn btn-success my-2 my-sm-0 " type="submit">Login</button>
        </form>
    </div>
</nav>

<!--- H E A D E R  CONTENT--->
<header class="hero_header">
    <div class="inner-container">
        <img class="heroLogo" src="../images/logo_whr.svg">
    </div>
</header>

<!--- M A I N CONTENT --->

<main class="container post_section ">
    <section>
        <div class="row latest_featured_article">
            <div class="col-12 post_parallax">
                <a href="">
                <img src="../images/paint_featured_interior%20copy.jpg">
                </a>
                <div class="text-block">
                    <h4>Article</h4>
                    <p>Poop</p>
                </div>
            </div>
            <div class="col-6 post_parallax">
                <a href="">
                <img src="../images/jen-p-541467-unsplash%20copy.jpg">
                </a>
                <div class="text-block">
                    <h4>Article</h4>
                    <p>Poop </p>
                </div>
            </div>
            <div class="col-6 post_parallax">
                <a href="">
                <img src="../images/dane-deaner-272375-unsplash%20copy.jpg">
                </a>
                <div class="text-block">
                    <h4>Article</h4>
                    <p>Poop</p>
                </div>
            </div>
        </div>
        <div class="row featured_articles">
            <div class="col-sm">
                <a href="">
                <img src="../images/julian-o-hayon-237297-unsplash%20copy.jpg">
                </a>
                <div class="text-block">
                    <h4>Article</h4>
                    <p>Poop</p>
                </div>
            </div>
            <div class="col-sm">
                <a href="">
                <img src="../images/alexandru-acea-674023-unsplash.jpg">
                </a>
                <div class="text-block">
                    <h4>Article</h4>
                    <p>Poop</p>
                </div>
            </div>
        </div>
    </section>

</main>
</body>
</html>