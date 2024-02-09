<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once './auth.php';

// Check if the user is authenticated
checkAuthentication();

?>
<?php
// fetch-bazaar-info.php
include_once './db.php';

// Your database connection and session_start() code here

function fetchBazaarInfoById($userId) {
    global $conn;

    // Prepare and execute the query
    $query = "SELECT b.id, b.bazaar_name
              FROM bazaar b
              JOIN users u ON u.user_id = b.bazaar_access_to_users
              WHERE u.user_id = ?";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $stmt->bind_result($bazaarId, $bazaarName);

    // Fetch the results
    $stmt->fetch();

    // Check if the result is not empty
    if ($bazaarId !== null) {
        return [
            'bazaar_id' => $bazaarId,
            'bazaar_name' => $bazaarName,
        ];
    } else {
        return null; // Return null if bazaar not found
    }
}

// Get user_id from session
$userId = $_SESSION['user_id'];

// Fetch bazaar information
$bazaarInfo = fetchBazaarInfoById($userId);

if ($bazaarInfo) {
    // Return the bazaar information as JSON
    echo json_encode([
        'success' => true,
        'bazaar_id' => $bazaarInfo['bazaar_id'],
        'bazaar_name' => $bazaarInfo['bazaar_name'],
    ]);
} else {
    // Return an error message if bazaar information is not found
    echo json_encode([
        'success' => false,
        'message' => 'Bazaar information not found.',
    ]);
}
?>
