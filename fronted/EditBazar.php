<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

header("Content-Type: application/json");

include("./db.php");

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

// Read the request body as JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON data"]);
    exit;
}

$id = $data["id"];
$bazaar_name = $data["bazaar_name"];
$bazaar_opentime = $data["bazaar_opentime"];
$bazaar_closetime = $data["bazaar_closetime"];
$bazaar_result = $data["bazaar_result"];
$bazaar_access_to_users = $data["bazaar_access_to_users"];
// Update the record in the database
$sql = "UPDATE bazaar SET bazaar_name='$bazaar_name', bazaar_opentime='$bazaar_opentime', bazaar_closetime='$bazaar_closetime', bazaar_result='$bazaar_result', bazaar_access_to_users='$bazaar_access_to_users' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Bazar updated successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error updating Bazar: " . $conn->error]);
}

$conn->close();
?>
