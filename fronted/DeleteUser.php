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

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the POST request
    $user_id = $_POST["user_id"];

    // Validate and sanitize data (you may want to implement more robust validation)
    $user_id = filter_var($user_id, FILTER_VALIDATE_INT);

    // SQL query to delete data in the user_details table first
    $sqlDetails = "DELETE FROM user_details WHERE user_id = $user_id";

    if ($conn->query($sqlDetails) === TRUE) {
        // Now that user details are deleted, proceed to delete the user
        $sql = "DELETE FROM users WHERE user_id = $user_id";

        if ($conn->query($sql) === TRUE) {
            // Return a success response
            echo json_encode(["success" => true, "message" => "User deleted successfully"]);
        } else {
            // Return an error response
            echo json_encode(["success" => false, "message" => "Error deleting user: " . $conn->error]);
        }
    } else {
        // Return an error response for user_details deletion
        echo json_encode(["success" => false, "message" => "Error deleting user details: " . $conn->error]);
    }

    // Close the database connection
    $conn->close();
}
