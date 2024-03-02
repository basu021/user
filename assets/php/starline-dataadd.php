<?php
// Include database connection and any necessary validation functions
include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $starlineId = $_POST['starlineid'];
    $datevalue = $_POST['datevalue'];

    // Create an array to store hour values
    $hourValues = [];

    // Loop through hours
    for ($i = 1; $i <= 12; $i++) {
        $hourOpen = isset($_POST["{$i}_open"]) ? $_POST["{$i}_open"] : null;
        $hourJodi = isset($_POST["{$i}_jodi"]) ? $_POST["{$i}_jodi"] : null;

        // Add hour open and jodi values to the array
        $hourValues[] = $hourOpen;
        $hourValues[] = $hourJodi;
    }

    // Prepare the SQL query
    $sql = "INSERT INTO panel_starline (
              datevalue, starline_id, 
              hour1_open, hour1_jodi, 
              hour2_open, hour2_jodi, 
              hour3_open, hour3_jodi, 
              hour4_open, hour4_jodi, 
              hour5_open, hour5_jodi, 
              hour6_open, hour6_jodi, 
              hour7_open, hour7_jodi, 
              hour8_open, hour8_jodi, 
              hour9_open, hour9_jodi, 
              hour10_open, hour10_jodi, 
              hour11_open, hour11_jodi, 
              hour12_open, hour12_jodi
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Generate the type definition string dynamically
    $typeDefinition = str_repeat('s', count($hourValues) + 2);

    // Bind parameters for the SQL query
    $bindParams = [&$typeDefinition, &$datevalue, &$starlineId];
    foreach ($hourValues as &$value) {
        $bindParams[] = &$value;
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation is successful
    if ($stmt !== false) {
        // Bind parameters using call_user_func_array
        call_user_func_array([$stmt, 'bind_param'], $bindParams);

        // Execute the statement
        if ($stmt->execute()) {
            // Data insertion successful
            echo "<script>alert('Successfully Added the Values');</script>";
            echo "<script>window.location.href = document.referrer;</script>";
        } else {
            // Data insertion failed
            echo json_encode(['success' => false, 'message' => 'Error storing data in the database.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Statement preparation failed
        echo json_encode(['success' => false, 'message' => 'Error preparing the SQL statement.']);
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted using POST method
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
