<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once './auth.php';

// Check if the user is authenticated
checkAuthentication();

// fetch-starline-info.php
include_once './db.php';

// Your database connection and session_start() code here
function fetchstarlineInfoById($userId) {
    global $conn;

    // Prepare and execute the query
    $query = "SELECT b.id, b.starline_name
              FROM starline b
              JOIN users u ON u.user_id = b.starline_access_to_users
              WHERE u.user_id = ?";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $stmt->bind_result($starlineId, $starlineName);

    // Fetch the results
    $starline = [];
    while ($stmt->fetch()) {
        $starline[] = [
            'starline_id' => $starlineId,
            'starline_name' => $starlineName,
        ];
    }

    // Check if the result is not empty
    return $starline;
}

// Get user_id from session
$userId = $_SESSION['user_id'];

// Fetch starline information
$starlineInfo = fetchstarlineInfoById($userId);

if ($starlineInfo) {
    // Return the starline information as JSON
    echo json_encode([
        'success' => true,
        'starline' => $starlineInfo,
    ]);
} else {
    // Return an error message if starline information is not found
    echo json_encode([
        'success' => false,
        'message' => 'starline information not found.',
    ]);
}
?>
