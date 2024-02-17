<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

// Include the db.php file to establish the database connection
include 'db.php';

try {
    // Fetch data from user_details and users tables
    $sql = "SELECT ud.user_id, ud.shortdesc, ud.full_name, ud.mobile, u.email, u.role, ud.date_of_birth
    FROM user_details ud
    JOIN users u ON ud.user_id = u.user_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($user_id, $shortdesc, $full_name, $mobile, $email, $role, $dob);
    
    // Fetch the data
    $contacts = array();
    while ($stmt->fetch()) {
        $contacts[] = [
            'id' => (int)$user_id,
            'shortDesc' => $shortdesc,
            'fullname' => $full_name,
            'mobile' => $mobile, 
            'email' => $email,
            'role' => $role,
            'dob' => $dob,
        ];
    }

    // Encode the result as JSON
    $jsonResult = json_encode($contacts, JSON_PRETTY_PRINT);

    // Output the JSON result
    header('Content-Type: application/json');
    echo $jsonResult;

} catch (Exception $e) {
    die("Error fetching data from the database: " . $e->getMessage());
}
?>
