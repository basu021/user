<?php

header('Content-Type: application/json');
// Allow from any origin
header('Content-Type: application/json');
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

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }

    exit(0);
}


// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $json_data = file_get_contents('php://input');

    // Decode the JSON data
    $data = json_decode($json_data);

    // Check if the required field (week_name) is present
    if (isset($data->week_name)) {
        // Your database connection logic here
        include('./db.php');

        // Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape the values to prevent SQL injection
        $week_name = $conn->real_escape_string($data->week_name);

        // SQL query to delete the Jodi record
        $sql = "DELETE FROM jodi WHERE week_name = '$week_name'";

        if ($conn->query($sql) === TRUE) {
            // Return success response
            echo json_encode(['status' => 'success', 'message' => 'Jodi deleted successfully']);
        } else {
            // Return error response
            echo json_encode(['status' => 'error', 'message' => 'Error deleting Jodi']);
        }

        // Close the database connection
        $conn->close();
    } else {
        // Return error response if week_name is not provided
        echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    }
} else {
    // Return error response if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

?>

