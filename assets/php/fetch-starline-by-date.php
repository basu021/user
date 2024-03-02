
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Connect to your database here
include_once './db.php';
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

// Check if starlineId and selectedDate are provided
if(isset($_POST['starlineId']) && isset($_POST['selectedDate'])) {
    // Sanitize inputs
    $starlineId = intval($_POST['starlineId']);
    $selectedDate = $_POST['selectedDate'];

    // Prepare and execute query to fetch panel data
    $stmt = $conn->prepare("SELECT * FROM panel_starline WHERE starline_id = ? AND datevalue = ?");
    $stmt->bind_param("is", $starlineId, $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are rows returned
    if($result->num_rows > 0) {
        // Fetch panel data and add to the array
        $panelData = array();
        while($row = $result->fetch_assoc()) {
            $panelData = array(
                'hour1_open' => $row['hour1_open'],
                'hour1_jodi' => $row['hour1_jodi'],
                'hour2_open' => $row['hour2_open'],
                'hour2_jodi' => $row['hour2_jodi'],
                'hour3_open' => $row['hour3_open'],
                'hour3_jodi' => $row['hour3_jodi'],
                'hour4_open' => $row['hour4_open'],
                'hour4_jodi' => $row['hour4_jodi'],
                'hour5_open' => $row['hour5_open'],
                'hour5_jodi' => $row['hour5_jodi'],
                'hour6_open' => $row['hour6_open'],
                'hour6_jodi' => $row['hour6_jodi'],
                'hour7_open' => $row['hour7_open'],
                'hour7_jodi' => $row['hour7_jodi'],
                'hour8_open' => $row['hour8_open'],
                'hour8_jodi' => $row['hour8_jodi'],
                'hour9_open' => $row['hour9_open'],
                'hour9_jodi' => $row['hour9_jodi'],
                'hour10_open' => $row['hour10_open'],
                'hour10_jodi' => $row['hour10_jodi'],
                'hour11_open' => $row['hour11_open'],
                'hour11_jodi' => $row['hour11_jodi'],
                'hour12_open' => $row['hour12_open'],
                'hour12_jodi' => $row['hour12_jodi']
                // Add more hour data as needed
            );
        }

        // Output panel data as JSON
        echo json_encode($panelData);
    } else {
        // Output error message if no data found
        echo json_encode(array('error' => 'No panel data found for the selected starline and date.'));
    }

    // Close statement
    $stmt->close();
} else {
    // Handle case where starlineId or selectedDate is not provided
    echo json_encode(array('error' => 'Starline ID or selected date not provided.'));
}

// Close connection
$conn->close();
?>
