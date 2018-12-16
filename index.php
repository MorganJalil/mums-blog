<?php
session_start();
include 'includes/header.php';
?>

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
    
            
    <footer role="contentinfo">
        <address>
          <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>
        </address>
        <small>Copyright &copy; <time>2018</time></small>
    </footer>
    
</body>
</html>