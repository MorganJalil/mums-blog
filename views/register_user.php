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
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/index_register.css">

    <title>Millhouse</title>
</head>
<!-- Delete this when we have includes with header.php, navbar.php etc.-->
<body class="body_index">

    <header role="banner">
        <div class="container-fluid">
            <img src="../images/hero_image.svg" class="hero_image" alt="Logo Big">
    
        </div>

    <nav role="navigation">
    </nav>

    </header>

        <!-- basic form, needs styling
        <h2 class="register">Register</h2>-->
            <form action="../includes/register.php" class="form_index" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label class="sr-only" for="reg_user">Username</label>
                        <input type="text" class="form-control border-1" name="username" Placeholder="Username"
                        id="reg_user" required>
                    <?php
                        if(isset($_SESSION['username_fail'])){
                            $username_fail = $_SESSION['username_fail'];
                            echo "<span class='error_msg'>$username_fail</span>";
                        }
                    ?>
                    </div><br/>

                    <div class="form-group col-md-6">
                        <label class="sr-only" for="reg_password">Password</label>
                        <input type="password" class="form-control border-1" name="password" Placeholder="Password"
                        id="reg_password" required>
                    <?php
                        if(isset($_SESSION['pwd_fail'])){
                        $pwd_fail = $_SESSION['pwd_fail'];
                        echo "<span class='error_msg'>$pwd_fail</span>";
                        }
                    ?>
                    </div><br/>
                

                
                    <div class="form-group col-md-12">
                        <label class="sr-only" for="reg_email">email</label> 
                        <input type="email" class="form-control border-1" name="email" placeholder="email" 
                        id="reg_email" required>
                        <input type="hidden" name="email_id" id="email_id">
                    <?php
                        if(isset($_SESSION['email_fail'])){
                        $email_fail = $_SESSION['email_fail'];
                        echo "<span class='error_msg'>$email_fail</span>";
                    }
                    ?>
                    <br/>
                    <a href="../index.php"  class="btn btn-outline-info" role="button">Back</a>
                    <button type="submit" value="submit" class="btn btn-outline-secondary" name="login">Register</button>
                    </div><br/>
                </div>
            
        <?php
            if(isset($_SESSION['username_taken'])){
                $username_taken = $_SESSION['username_taken'];
                echo "<span class='error_msg'>$username_taken</span><br/>";
                unset($_SESSION['username_taken']);
            }
            
            if(isset($_SESSION['email_taken'])){
                $email_taken = $_SESSION['email_taken'];
                echo "<span class='error_msg'>$email_taken</span><br/>";
                unset($_SESSION['email_taken']);
            }
        ?>
        </form>

        <footer role="contentinfo">
        <address>
          <p>For further information, please contact <a href="mailto:admin@example.com">Millhouse</a>.</p>
        </address>
        <small>Copyright &copy; <time>2018</time></small>
    </footer>
    </body>
</html>