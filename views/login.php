<?php
session_start();
include '../includes/database_connection.php';


// assigned variable for username and password.
$userName = $_POST['username'];
$password = $_POST['password'];

$userInfo = $pdo->prepare('SELECT * FROM users WHERE username = :username');

$userInfo->execute([

    'username' => $userName,

]);

$fetched_user = $userInfo->fetch(); // fetch user info from DB's table user.

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$validPassword = password_verify($password, $fetched_user["password"]);

$message = " "; // if statement, if user submitted login & correct password -> set user in session else display msg.

if (isset($_POST['login'])) {
    if ($validPassword) {
        $_SESSION["username"] = $fetched_user["username"];
        $_SESSION["user_id"] = $fetched_user["id"];
        header('location: ../index.php');
    } else {
        $message = "Wrong username or password";
    }
}
