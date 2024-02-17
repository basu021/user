<?php
header('Content-Type: application/json');

include("./db.php");
// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

// Assuming the request is a GET request
$query = "SELECT * FROM jodi";
$result = $conn->query($query);

if ($result) {
    $jodis = [];
    while ($row = $result->fetch_assoc()) {
        $jodis[] = $row;
    }
    
    echo json_encode(['status' => 'success', 'data' => $jodis]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error executing query: ' . $conn->error]);
}

$conn->close();
?>
