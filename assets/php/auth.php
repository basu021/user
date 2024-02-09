<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function checkAuthentication() {
    if (!isset($_SESSION['user_id'])) {
        // User is not authenticated, redirect to login page
        header('Location: ./login.html');
        exit();
    }
}

// Call this function at the beginning of any page that requires authentication
checkAuthentication();
?>
