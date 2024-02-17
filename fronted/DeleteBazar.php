<?php
header('Content-Type: application/json');

include("./db.php");

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

// Assuming the request is a POST request with JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Validate and sanitize input data (consider using mysqli_real_escape_string or parameterized queries)
$bazarId = $data['id'] ?? '';

// Delete Bazar record
$query = "DELETE FROM bazaar WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param('s', $bazarId);
    $stmt->execute();

    if ($stmt->error) {
        echo json_encode(['status' => 'error', 'message' => 'Error executing query: ' . $stmt->error]);
    } else {
        $stmt->close();
        $conn->close();
        echo json_encode(['status' => 'success', 'message' => 'Bazar deleted successfully']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to prepare statement']);
}
?>
