<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    if (isset($requestData['id'])) {
        $id = $requestData['id'];

        include("./db.php");

        // Use prepared statement to prevent SQL injection
        $deleteQuery = $conn->prepare("DELETE FROM luckynumbers WHERE id = ?");
        $deleteQuery->bind_param("i", $id);
        $deleteResult = $deleteQuery->execute();

        if ($deleteResult) {
            $response = array("status" => "success", "message" => "Record deleted successfully");
        } else {
            $response = array("status" => "error", "message" => "Delete failed: " . $conn->error);
        }

        $deleteQuery->close();
        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
