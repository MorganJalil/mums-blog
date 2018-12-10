<?php
/**
 *
 * Page : Logout
 */
 
// start session
session_start();
// Destroy user session
unset($_SESSION['user_id']);
session_destroy(); 
// Redirect to index.php page
header("Location: ../index.php");
