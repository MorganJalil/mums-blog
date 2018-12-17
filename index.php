<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/index_register.css">
        <title>Millhouse</title>

    </head>

    <body class="body_index">
        <header role="banner">
            <img src="images/hero_image.svg" class="hero_image" alt="Logo Big">
            
            <nav role="navigation">
            </nav>
        </header>

        <main role="main">
            <form action="views/login.php" class="form_index" method="post"> 
                
                <?php //login fail error message
                    if(isset($_SESSION['login_failed'])){
                        $login_failed = $_SESSION['login_failed'];
                        echo "<span class='error_msg'>$login_failed</span>";
                    }
                ?>
               
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="sr-only" for="username">Username</label>
                        <input type="text" class="form-control border-1" name="username" Placeholder="Username">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="sr-only" for="password">Password</label>
                        <input type="password" class="form-control border-1" name="password" Placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-secondary" name="login"> Log in</button><br/>  
                <div class="alert alert-info" id="member_register" role="alert">Not a member? <a href="views/register_user.php">Register</a></div>
            </form>
        </main>
              
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