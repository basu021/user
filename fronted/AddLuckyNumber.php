<?php
// addLuckyNumber.php

include("./db.php");

// Allow from any origin
 //   header("Access-Control-Allow-Origin: *");
//    header('Access-Control-Allow-Credentials: true');
//    header('Access-Control-Max-Age: 86400');    // cache for 1 day
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Replace with your frontend's origin
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); // cache for 1 day
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

// Retrieve data from the request
$goldenAnk = $_POST['goldenAnk'] ?? '';
$motorPatti = $_POST['motorPatti'] ?? '';

// Use parameterized query to prevent SQL injection
$sql = "INSERT INTO luckynumbers (goldenAnk, motorPatti) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ss", $goldenAnk, $motorPatti);

// Execute the query
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();

?>
