<?php

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *");
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
header("Access-Control-Allow-Origin: http://localhost");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); // cache for 1 day
// Ensure that it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once 'db.php';
    // Collect form data
    $starlineId = $_POST['starlineId'];
    $selectedDate = $_POST['selectedDate'];

    // Construct SQL UPDATE query
    $updateQuery = "UPDATE panel_starline SET ";
    
    // Manual update statements for each hour
    $updateQuery .= "hour1_open = '{$_POST['1_open']}', hour1_jodi = '{$_POST['1_jodi']}', ";
    $updateQuery .= "hour2_open = '{$_POST['2_open']}', hour2_jodi = '{$_POST['2_jodi']}', ";
    $updateQuery .= "hour3_open = '{$_POST['3_open']}', hour3_jodi = '{$_POST['3_jodi']}', ";
    $updateQuery .= "hour4_open = '{$_POST['4_open']}', hour4_jodi = '{$_POST['4_jodi']}', ";
    $updateQuery .= "hour5_open = '{$_POST['5_open']}', hour5_jodi = '{$_POST['5_jodi']}', ";
    $updateQuery .= "hour6_open = '{$_POST['6_open']}', hour6_jodi = '{$_POST['6_jodi']}', ";
    $updateQuery .= "hour7_open = '{$_POST['7_open']}', hour7_jodi = '{$_POST['7_jodi']}', ";
    $updateQuery .= "hour8_open = '{$_POST['8_open']}', hour8_jodi = '{$_POST['8_jodi']}', ";
    $updateQuery .= "hour9_open = '{$_POST['9_open']}', hour9_jodi = '{$_POST['9_jodi']}', ";
    $updateQuery .= "hour10_open = '{$_POST['10_open']}', hour10_jodi = '{$_POST['10_jodi']}', ";
    $updateQuery .= "hour11_open = '{$_POST['11_open']}', hour11_jodi = '{$_POST['11_jodi']}', ";
    $updateQuery .= "hour12_open = '{$_POST['12_open']}', hour12_jodi = '{$_POST['12_jodi']}' ";
    
    // Display the received values for debugging
    echo "Received Values: <br>";
    echo "Starline ID: $starlineId<br>";
    echo "Selected Date: $selectedDate<br>";
    

    // Add WHERE clause to target the specific row
    $updateQuery .= "WHERE starline_id = $starlineId AND datevalue = '$selectedDate'";

    // Execute the query
    if ($conn->query($updateQuery) === TRUE) {
        // Query executed successfully
        echo json_encode(['success' => true]);
    } else {
        // Error in query execution
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    // Close the database connection if needed
    $conn->close();
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
