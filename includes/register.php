<?php
session_start();
include 'database_connection.php';
include '../classes/user.php';

$user = new User($pdo);
$user->register($_POST['username'], $_POST['password'], $_POST['email']);