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
                <input type="text" name="username" placeholder="username" id="reg_user"><br/>
                <label for="reg_password">Password</label><br/>
                <?=($_SESSION['test'])?>
                <input type="password" name="password" placeholder="password" id="reg_password"><br/>
                <label for="reg_email">eMail</label><br/>
                <input type="email" name="email" placeholder="Email" id="reg_email"><br/>
                <input type="hidden" name="id" id="id"><br/>
                <input type="submit" value="submit" class="btn btn-primary" ><br/>
            </form>
</body>
</html>