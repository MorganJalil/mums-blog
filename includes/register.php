<?php
session_start();
include 'database_connection.php';
include '../classes/User.php';

//make a new user object by calling Class User and using method register
$user = new User($pdo);
$user->register($_POST['username'], $_POST['password'], $_POST['email']);