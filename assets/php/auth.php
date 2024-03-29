<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function checkAuthentication() {
    if (!isset($_SESSION['user_id'])) {
        // User is not authenticated, redirect to login page
        header('Location: login.html');
        exit();
    }
// Check if user role is not admin or superadmin
if ($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] != "superadmin") {
    header('Location: i.html');
    exit();
}
}

// Call this function at the beginning of any page that requires authentication
checkAuthentication();
?>
