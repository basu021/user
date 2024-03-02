
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['starlineid'])) {
    $selectedstarlineid = $_GET['starlineid'];

    // Perform the query to fetch dates based on the selected Bazaar
    $query = "SELECT datevalue FROM panel_starline WHERE starline_id = '$selectedstarlineid'";
    $result = mysqli_query($conn, $query);

    // Fetch the dates and create an array
    $dates = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[] = $row['datevalue'];
    }

    // Return the dates as JSON
    echo json_encode($dates);
}
// else {
//     $query = "SELECT datevalue FROM panel_starline";
//     $result = mysqli_query($conn, $query);

//     // Fetch the dates and create an array
//     $dates = array();
//     while ($row = mysqli_fetch_assoc($result)) {
//         $dates[] = $row['datevalue'];
//     }

//     // Return the dates as JSON
//     echo json_encode($dates);
// }
?>
