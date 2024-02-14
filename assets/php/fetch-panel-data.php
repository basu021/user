<?php
// Connect to your database here

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bazarId']) && isset($_POST['weekValue'])) {
    $selectedBazarId = $_POST['bazarId'];
    $selectedWeek = $_POST['weekValue'];

    // Perform the query to fetch panel data based on the selected Bazaar and week
    $query = "SELECT * FROM panel WHERE bazar_id = '$selectedBazarId' AND weekvalue = '$selectedWeek' LIMIT 1";
    $result = mysqli_query($conn, $query);

    // Fetch the data
    $row = mysqli_fetch_assoc($result);

    // Return the data as JSON
    echo json_encode($row);
}
?>
