<?php
    session_start();
include '../includes/database_connection.php';

// assign variable for username and password.
// fetch user info from DB's table user.
// hash to secure password
// TODO! Create the $_POST name in html.



$userName = $_POST['username'];
$password = $_POST['password'];

$userInfo = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password ');

$userInfo->execute([

    'username' => $userName,
    'password' => $password

]);

$fetched_user = $userInfo->fetch();


$validPassword = password_verify($password, $fetched_user["password"]);

    if(isset($_POST['logIn'])){
        header('location:../index.php');
        if ($validPassword){
            $_SESSION["username"] = $fetched_user["username"];
            $_SESSION["id"] = $fetched_user["id"];
        } else {
            header('location: ../index.php');

        }

    }
