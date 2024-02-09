<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Include the database connection file
include_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You may want to perform additional validation and sanitization

    // Check if the email is already registered
    $check_query = "SELECT * FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param('s', $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Email is already registered, handle accordingly (e.g., show error message)
        echo "Email is already registered. Please use a different email.";
    } else {
        // Insert new user into the database with default role 'user'
        $insert_query = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'user')";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('sss', $fullname, $password, $email);

        if ($insert_stmt->execute()) {
            // Registration successful, redirect to login page
            header('Location: ../../login.html');
            exit();
        } else {
            // Registration failed, handle accordingly (e.g., show error message)
            echo "Registration failed. Please try again.";
        }
    }
}

// Close the database connection
$conn->close();
?>
