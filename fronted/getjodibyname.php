<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

include("./db.php");

// Get the request data (supports both JSON and form data)
$data = json_decode(file_get_contents('php://input'), true);

// Check if bazar_id is set in the request data
if (isset($data['bazar_id']) && $data['bazar_id'] !== null) {
    $bazarId = $data['bazar_id'];

    // Use proper SQL queries to retrieve Jodi data by Bazar ID
    $query = "SELECT * FROM jodi WHERE bazaar_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bazarId); // Assuming bazaar_id is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    $jodiData = [];

    while ($row = $result->fetch_assoc()) {
        $jodiData[] = $row;
    }

    $stmt->close();
    $conn->close();

    echo json_encode(['status' => 'success', 'data' => $jodiData]);
} else {
    // Fetch all Jodi data if no bazar_id is provided
    $query = "SELECT * FROM jodi";

    $result = $conn->query($query);

    $jodiData = [];

    while ($row = $result->fetch_assoc()) {
        $jodiData[] = $row;
    }

    $conn->close();

    echo json_encode(['status' => 'success', 'data' => $jodiData]);
}
?>

