<?php
// start session
session_start();
// Destroy user session
unset($_SESSION['admin']);
unset($_SESSION["username"]);
session_destroy(); 
// Redirect to index.php page
header("Location: ../index.php");
