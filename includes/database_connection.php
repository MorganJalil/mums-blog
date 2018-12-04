<?php
$pdo = new PDO(
    "mysql:host=localhost:8889;dbname=millhouse;charset=utf8",
    "root",
    "root"
);
//Enable error mode
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);