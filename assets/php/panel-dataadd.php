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
    foreach (["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"] as $day) {
        // Loop through three input fields for each day
        for ($i = 1; $i <= 3; $i++) {
            $fieldName = "{$day}_{$i}";
            $number = isset($_POST[$fieldName]) ? $_POST[$fieldName] : null;

            // Add the number to the array
            $dayNumberValues[] = $number;
        }
    }

    // Convert the dayNumberValues array to a JSON string and store it in the database
    $jsonValues = json_encode($dayNumberValues);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO panel (weekvalue, bazar_id, Monday_1, Monday_2, Monday_3, Tuesday_1, Tuesday_2, Tuesday_3, Wednesday_1, Wednesday_2, Wednesday_3, Thursday_1, Thursday_2, Thursday_3, Friday_1, Friday_2, Friday_3, Saturday_1, Saturday_2, Saturday_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Determine the number of placeholders needed in the type definition string
    $placeholders = count($dayNumberValues);

    // Generate the type definition string dynamically
    $typeDefinition = 'si' . str_repeat('i', $placeholders);

    // Bind parameters for the SQL query
    $stmt->bind_param($typeDefinition, $weekValue, $bazarId, ...$dayNumberValues);

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
    // If the form was not submitted using POST method
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

// Close the database connection
$conn->close(); 
?>
