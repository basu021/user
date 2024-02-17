<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sattamtka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response = array("status" => "error", "message" => "Failed to connect to MySQL: " . $conn->connect_error);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} 
?>
