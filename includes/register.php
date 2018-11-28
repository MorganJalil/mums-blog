<?php
session_start();
include 'database_connection.php';
include '../classes/User.php';

$user = new User($pdo);
$user->register($_POST['username'], $_POST['password'], $_POST['email']);

header("location:../index.php");
