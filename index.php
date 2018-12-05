<?php
session_start();
include 'includes/header.php';
?>

<body class="body_index">

    <header role="banner">
        <div class="container-fluid">
            <img src="images/logo_borders.png" class="hero_image" alt="Logo Big">
        
        </div>
        <nav role="navigation">
        </nav>
    </header>

    
        <main role="main">

            <form action="views/login.php" class="form_index" method="post">    
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="sr-only" for="username">Username</label>
                        <input type="text" class="form-control" name="username" Placeholder="Username">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="sr-only" for="password">Password</label>
                        <input type="password" class="form-control" name="password" Placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="login"> Log in</button><br/>
                Not a member? <a href="views/register_user.php">Register</a>
            </form>
        </main>
    

    <footer role="contentinfo">
        <address>
          <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>
        </address>
        <small>Copyright &copy; <time>2018</time></small>
    </footer>

</body>
</html>