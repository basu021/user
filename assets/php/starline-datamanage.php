<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection file
include_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that all required fields are present
    $requiredFields = ['starlineid', 'weekvalue'];
    $hours = range(1, 12);

    foreach ($hours as $hour) {
        $requiredFields[] = "{$hour}_open";
        $requiredFields[] = "{$hour}_jodi";
    }

    $missingFields = array_diff($requiredFields, array_keys($_POST));

    if (!empty($missingFields)) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields: ' . implode(', ', $missingFields)]);
        exit;
    }

    // Process and insert or update data in the database
    $starlineId = $_POST['starlineid'];
    $selectedWeek = $_POST['weekvalue'];

    // Check if data already exists for the specified week and starline_id
    $checkSql = "SELECT * FROM panel_starline WHERE starline_id = ? AND weekvalue = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param('is', $starlineId, $selectedWeek);
    $checkStmt->execute();

    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Data already exists, perform an update
        $updateSql = "UPDATE panel_starline SET ";
        foreach ($hours as $hour) {
            $updateSql .= "hour{$hour}_open = ?, hour{$hour}_jodi = ?, ";
        }
        $updateSql = rtrim($updateSql, ', '); // Remove the trailing comma

        $updateSql .= " WHERE starline_id = ? AND weekvalue = ?";
        
        $updateStmt = $conn->prepare($updateSql);

        // Bind parameters for update
        $updateParams = [];
        foreach ($hours as $hour) {
            $updateParams[] = &$_POST["{$hour}_open"];
            $updateParams[] = &$_POST["{$hour}_jodi"];
        }
        $updateParams[] = &$starlineId;
        $updateParams[] = &$selectedWeek;

        // Dynamically build the type string based on the number of hours
        $typeString = str_repeat('ss', count($hours) * 2);
        $typeString .= 'is'; // Add 'i' for starline_id and 's' for weekvalue

        $updateStmt->bind_param($typeString, ...$updateParams);
        $updateStmt->execute();

        // Data successfully updated
        echo "<script>alert('Successfully Updated the Values');";
        echo "window.location.href = document.referrer;</script>";
    } else {
        // Data doesn't exist, perform an insert
        // Insert code here if needed
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method']);
}
?>
