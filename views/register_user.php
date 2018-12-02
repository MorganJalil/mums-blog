<?php
session_start();
include '../classes/User.php';
?>

<!-- Delete this when we have includes with header.php, navbar.php etc.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<!-- basic form, needs styling -->
<form action="../includes/register.php" method="POST">
                <h2 class="register">Register</h2>
                <label for="reg_user">Username</label><br/>
                <input type="text" name="username" placeholder="username" id="reg_user" required>
                <?php
                    if(isset($_SESSION['username_fail'])){
                        $username_fail = $_SESSION['username_fail'];
                        echo "<span>$username_fail</span>";
                    }
                ?><br/>
                <label for="reg_password">Password</label><br/>
                <input type="password" name="password" placeholder="password" id="reg_password" required>
                <?php
                    if(isset($_SESSION['pwd_fail'])){
                        $pwd_fail = $_SESSION['pwd_fail'];
                        echo "<span>$pwd_fail</span>";
                    }
                ?><br/>
                <label for="reg_email">email</label><br/> 
                <input type="email" name="email" placeholder="email" id="reg_email" required>
                <input type="hidden" name="id" id="reg_email">
                <?php
                    if(isset($_SESSION['email_fail'])){
                        $email_fail = $_SESSION['email_fail'];
                        echo "<span>$email_fail</span>";
                    }
                ?><br/>
                <input type="submit" value="submit" class="btn btn-primary" ><br/>
            </form>
            <?php
                if(isset($_SESSION['username_taken'])){
                    $username_taken = $_SESSION['username_taken'];
                    echo "<span>$username_taken</span><br/>";
                }
                if(isset($_SESSION['email_taken'])){
                    $email_taken = $_SESSION['email_taken'];
                    echo "<span>$email_taken</span><br/>";
                }
            ?>
</body>
</html>