<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Include the database connection file
include_once '../php/db.php';

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not authenticated
    header('Location: ../../login.html');
    exit();
}

// Fetch the user's role from the session
$userRole = $_SESSION['user_role'];

// Fetch the logged-in user's access to bazaars
$query = "SELECT b.id, b.bazaar_name, b.bazaar_opentime, b.bazaar_closetime, b.bazaar_result
          FROM bazaar b
          JOIN users u ON u.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Display bazaar information
while ($row = $result->fetch_assoc()) {
    echo "Bazaar Name: " . $row['bazaar_name'] . "<br>";
    echo "Open Time: " . $row['bazaar_opentime'] . "<br>";
    echo "Close Time: " . $row['bazaar_closetime'] . "<br>";
    echo "Result: " . $row['bazaar_result'] . "<br>";
    echo "<hr>";
}

// Close the database connection
$conn->close();
?>
