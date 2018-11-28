<?php

class User {
        
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password, $email) {
    
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
