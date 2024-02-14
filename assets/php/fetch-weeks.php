
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Connect to your database here
include_once './db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['bazarid'])) {
    $selectedBazarId = $_GET['bazarid'];

    // Perform the query to fetch weeks based on the selected Bazaar
    $query = "SELECT weekvalue FROM panel WHERE bazar_id = '$selectedBazarId'";
    $result = mysqli_query($conn, $query);

    // Fetch the weeks and create an array
    $weeks = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $weeks[] = $row['weekvalue'];
    }

    // Return the weeks as JSON
    echo json_encode($weeks);
}
?>
