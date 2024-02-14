<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection file
include_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that all required fields are present
    $requiredFields = ['bazarid', 'selectedWeek'];
    $days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];

    foreach ($days as $day) {
        $requiredFields[] = "{$day}_open";
        $requiredFields[] = "{$day}_jodi";
        $requiredFields[] = "{$day}_close";
    }

    $missingFields = array_diff($requiredFields, array_keys($_POST));

    if (!empty($missingFields)) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields: ' . implode(', ', $missingFields)]);
        exit;
    }

    // Process and insert or update data in the database
    $bazarId = $_POST['bazarid'];
    $selectedWeek = $_POST['selectedWeek'];

    // Check if data already exists for the specified week and bazar_id
    $checkSql = "SELECT * FROM panel WHERE bazar_id = ? AND weekvalue = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param('is', $bazarId, $selectedWeek);
    $checkStmt->execute();

    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Data already exists, perform an update
        $updateSql = "UPDATE panel SET ";
        foreach ($days as $day) {
            $updateSql .= "{$day}_open = ?, {$day}_jodi = ?, {$day}_close = ?, ";
        }
        $updateSql = rtrim($updateSql, ', '); // Remove the trailing comma

        $updateSql .= " WHERE bazar_id = ? AND weekvalue = ?";
        
$updateStmt = $conn->prepare($updateSql);

// Bind parameters for update
$updateParams = [];
foreach ($days as $day) {
    $updateParams[] = &$_POST["{$day}_open"];
    $updateParams[] = &$_POST["{$day}_jodi"];
    $updateParams[] = &$_POST["{$day}_close"];
}
$updateParams[] = &$bazarId;
$updateParams[] = &$selectedWeek;

// Dynamically build the type string based on the number of days
$typeString = str_repeat('sss', count($days));
$typeString .= 'is'; // Add 'i' for bazar_id and 's' for weekvalue

$updateStmt->bind_param($typeString, ...$updateParams);
$updateStmt->execute();

        // Data successfully updated
        // echo json_encode(['success' => 'Data successfully updated in the database']);
        echo "<script>alert('Successfully Updated the Values');";
            echo "window.location.href = document.referrer;</script>";
    } else {
       
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method']);
}
?>
