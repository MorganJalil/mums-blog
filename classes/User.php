<?php
include '../includes/functions.php';

class User {

    
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Method to sanitize variable from scripts and more.
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //method to insert user data into db
    public function register($username, $password, $email) {


        if(strlen($username) < 4 || ctype_space($username)){
            header('Location:../views/register_user.php?=namefailed');
            exit();
        } else {
            $username = test_input($username);
        }   

        if(strlen($password) < 6 || ctype_space($password)){
            header('Location:../views/register_user.php?test=passfailed');
            $_SESSION['test'] = 'passfailed';
            exit();
        } else {
            $_SESSION['test'] = null;
        }
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email is a valid email address");
        } else {
            header('Location:../views/register_user.php?=novalidmailfailed');
            exit();
        }
    
        $statement = $this->pdo->prepare("SELECT username, email FROM users WHERE username = :username OR email = :email");
        $statement->execute(
            [
                ":username" => $username,
                ":email" => $email
            ]
        );
        $fetched_data = $statement->fetch();
        
        if($fetched_data['username'] == $username){
            header('Location: ../views/register_user.php?=usernametaken');
            exit();
        } elseif($fetched_data['email'] == $email){
            header('Location: ../views/register_user.php?=mailtaken');
            exit();
        } else{

        //INSERT data into db
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this->pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, 
        :email)");
        $statement->execute(
            [
                ":username" => $username,
                ":password" => $hashed_password,
                ":email" => $email
            ]
        );
        header('Location: ../index.php');
    }
}
}
