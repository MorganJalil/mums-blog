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
        // Validations for inputs from form, and error messages.
        if(strlen($username) < 3 || ctype_space($username)){
            header('Location:../views/register_user.php?=namefailed');
            $_SESSION['username_fail'] = 'Username must be atleast 3 characters long.';
            exit();
        } else {
            $username = test_input($username);
            $_SESSION['username_fail'] = false;
        }   
        if(strlen($password) < 6 || ctype_space($password)){
            header('Location:../views/register_user.php?test=passfailed');
            $_SESSION['pwd_fail'] = 'Password must be atleast 6 characters long.';
            exit();
        } else {
            $_SESSION['pwd_fail'] = false;
        }
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email_fail'] = false;
        } else {
            header('Location:../views/register_user.php?=novalidmailfailed');
            $_SESSION['email_fail'] = 'Invalid email format';
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
        // Validation and error messages if name or mail already taken
        if($fetched_data['username'] == $username){
            header('Location: ../views/register_user.php?=usernametaken');
            $_SESSION['username_taken'] = 'Username is already taken';
            exit();
        } elseif($fetched_data['email'] == $email){
            header('Location: ../views/register_user.php?=mailtaken');
            $_SESSION['email_taken'] = 'email is already taken';
            exit();
        } else {
            $_SESSION['username_taken'] = false;
            $_SESSION['email_taken'] = false;
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