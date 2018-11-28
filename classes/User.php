<?php

class User {
        
    private $pdo;

    public function __contruct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password, $email) {
        
    }

    }