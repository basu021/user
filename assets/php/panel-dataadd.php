<?php
// Include database connection and any necessary validation functions
include_once './db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $bazarId = $_POST['bazarid'];
    $weekValue = $_POST['weekvalue'];

    // Create an array to store day and number values
    $dayNumberValues = [];

    // Loop through days
    foreach (["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"] as $day) {
        // Loop through three input fields for each day
        for ($i = 1; $i <= 3; $i++) {
            $fieldName = "{$day}_{$i}";
            $number = isset($_POST[$fieldName]) ? $_POST[$fieldName] : null;

            // Add the number to the array
            $dayNumberValues[] = $number;
        }
    }

    // Prepare the SQL query
    $sql = "INSERT INTO panel (weekvalue, bazar_id, 
              monday_open, monday_jodi, monday_close, 
              tuesday_open, tuesday_jodi, tuesday_close, 
              wednesday_open, wednesday_jodi, wednesday_close, 
              thursday_open, thursday_jodi, thursday_close, 
              friday_open, friday_jodi, friday_close, 
              saturday_open, saturday_jodi, saturday_close, 
              sunday_open, sunday_jodi, sunday_close) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Generate the type definition string dynamically
    $typeDefinition = 'ss' . str_repeat('s', count($dayNumberValues));

    // Bind parameters for the SQL query
    $bindParams = [$typeDefinition, &$weekValue, &$bazarId];
    foreach ($dayNumberValues as &$value) {
        $bindParams[] = &$value;
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation is successful
    if ($stmt !== false) {
        // Bind parameters using call_user_func_array
        call_user_func_array(array($stmt, 'bind_param'), $bindParams);

        // Execute the statement
        if ($stmt->execute()) {
            // Data insertion successful
            echo json_encode(['success' => true, 'message' => 'Data successfully stored in the database.']);
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
