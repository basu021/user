<?php 
// Check if the user is authenticated
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not authenticated
    header('Location: ../../login.html');
    exit();
}

include_once 'db.php';



?>