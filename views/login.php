<?php
session_start();
include "../includes/database_connection.php";


// assigned variable for username and password.
$username = $_POST['username'];
$password = $_POST['password'];

$userInfo = $pdo->prepare('SELECT * FROM users WHERE username = :username');

$userInfo->execute([

    'username' => $username,

]);


$fetched_user = $userInfo->fetch(); // fetch user info from DB's table user.

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$validPassword = password_verify($password, $fetched_user["password"]);


if (isset($_POST['login'])) {

    if ($validPassword) {
        $_SESSION["username"] = $fetched_user["username"];
        $_SESSION["user_id"] = $fetched_user["user_id"];
        $_SESSION["admin"] = $fetched_user["admin"];
        header('location: ../index.php?pooop');
        var_dump($_SESSION["admin"]);

    } else {
        header('location: ../index.php?login_failed_true');
    }
}

