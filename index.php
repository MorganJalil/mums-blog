<?php
session_start();
include 'includes/header.php';
?>

<body style="color: blue;">
    <header role="banner">
        <img src="images/logo_borders.png" class="hero_image" alt="Logo Big">
        <nav role="navigation">

        </nav>
    </header>

    <div class="wrap">
        <main role="main">

        <form action="views/login.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit" name="login"> Log in
        </button>
    </form>
        <a href="views/register_user.php">Register</a>
        </main>
    </div>

    <footer role="contentinfo">
        <address>
          <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>
        </address>
        <small>Copyright &copy; <time>2018</time></small>
    </footer>

</body>
</html>