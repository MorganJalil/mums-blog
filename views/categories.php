<?php
session_start();
if (empty($_SESSION['username'])) {
    header("Location: ../index.php?error=please_login");
}

include '../includes/database_connection.php';
include '../includes/db_fetches.php';
include '../includes/bootstrap_js.php';
/*include '../includes/functions.php';*/
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
    <link rel="stylesheet" type="text/css" href="../css/categories.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Millhouse</title>
</head>
<body id="category-page">

<!-- N A V . B A R -->‰

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
                <a class="nav-link" href="#">Category<span class="sr-only">(current)</span></a>
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
            <button class="btn btn-default my-2 my-sm-0 " type="submit">Log out</button>
        </a>
        <div class="createPost"><?php if ($_SESSION["admin"] == 1) { ?><a href="create_post.php">Create
                Post</a><?php } ?>
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

<!--- S E C T I O N  DIVIDER--->


<main class="container post_section_divider ">
    <div class="section_line">
        <span class="grey_line"></span>
        <span class="section_title"> <h2>categories</h2></span>
        <span class="grey_line"></span>
    </div>


    <!--- CATEGORY S E C T I O N  DIVIDER--->

    <div class="category_bar">
        <div class="category_section">
            <span class="grey_line"></span>
            <span class="category_title">Watches</span>
            <span class="grey_line"></span>
        </div>
        <ul class="list-group list-group-flush">
            <a href="#" class="list-group-item">Cras justo odio</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </ul>
        <div class="category_section">
            <span class="grey_line"></span>
            <span class="category_title">Shades</span>
            <span class="grey_line"></span>
        </div>
        <ul class="list-group list-group-flush">
            <a href="#" class="list-group-item">Cras justo odio</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </ul>
        <div class="category_section">
            <span class="grey_line"></span>
            <span class="category_title">Interior</span>
            <span class="grey_line"></span>
        </div>
        <ul class="list-group list-group-flush">
            <a href="#" class="list-group-item">Cras justo odio</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </ul>
    </div>
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
</body>
</html>