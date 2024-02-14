
<?php
// Connect to your database here
include_once './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bazarId'])) {
    $selectedBazarId = $_POST['bazarId'];

    // Perform the query to fetch weeks based on the selected Bazaar
    $query = "SELECT DISTINCT weekvalue FROM panel WHERE bazar_id = '$selectedBazarId'";
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
