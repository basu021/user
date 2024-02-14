<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection file
include_once('db.php');

// Check if the required parameters are set
if (isset($_GET['bazarid']) && isset($_GET['weekValue'])) {
    $bazarId = $_GET['bazarid'];
    $weekValue = $_GET['weekValue'];

    // Fetch panel data from the database based on Bazaar and Week
    $sql = "SELECT * FROM panel WHERE bazar_id = ? AND weekvalue = ?";
    $stmt = $conn->prepare($sql);  // Assuming $conn is your database connection

    $stmt->bind_param('is', $bazarId, $weekValue);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $panelData = $result->fetch_assoc();

        // Return the panel data as JSON
        header('Content-Type: application/json');
        echo json_encode($panelData);
    } else {
        // Handle database error
        http_response_code(500);
        echo json_encode(['error' => 'Database error']);
    }
} else {
    // Parameters are not set
    http_response_code(400);
    echo json_encode(['error' => 'Invalid parameters']);
}
?>
