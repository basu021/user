<?php 
// Assume you receive the updated data as a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON data sent from the frontend
    $requestData = json_decode(file_get_contents('php://input'), true);

    // Ensure necessary fields are present
    if (isset($requestData['id']) && isset($requestData['newData'])) {
        $id = $requestData['id'];
        $newData = $requestData['newData'];

        include("./db.php");

        // Perform the update operation
        $updateQuery = "UPDATE luckynumbers SET columnName1 = '$newData1', columnName2 = '$newData2' WHERE id = $id";
        $updateResult = $conn->query($updateQuery);

        // Check if the update was successful
        if ($updateResult) {
            $response = array("status" => "success", "message" => "Record updated successfully");
        } else {
            $response = array("status" => "error", "message" => "Update failed: " . $conn->error);
        }

        // Close the database conn
        $conn->close();

        // Set response headers to JSON format
        header('Content-Type: application/json');

        // Output the response as JSON
        echo json_encode($response);
    }
}

?>