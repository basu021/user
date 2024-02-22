<?php

// Check if the user is authenticated
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not authenticated
    header('Location: ../../login.html');
    exit();
}

include_once 'db.php';

// Create an associative array to hold the response data
$response = array('success' => false, 'message' => '');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $bazaarId = isset($_POST['bazaar_id']) ? (int)$_POST['bazaar_id'] : 0;
    $result = isset($_POST['bazaar_result']) ? trim($_POST['bazaar_result']) : '';

    // Validate and sanitize user inputs
    if ($bazaarId <= 0 || empty($result)) {
        $response['message'] = "Invalid input data. Please provide valid information.";
    } else {
        // Update the bazaar information in the database
        $query = "UPDATE bazaar SET bazaar_result = ? WHERE id = ?";
        $stmt = $conn->prepare($query);

        // Validate the statement
        if (!$stmt) {
            $response['message'] = "Error preparing statement: " . $conn->error;
        } else {
            $stmt->bind_param('si', $result, $bazaarId);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = "Bazaar result updated successfully!";
            } else {
                $response['message'] = "Error updating bazaar result: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    }
}

// Close the database connection
$conn->close();

// Return the response as JSON
echo json_encode($response);
?>
