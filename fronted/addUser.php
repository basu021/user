<?php
header('Content-Type: application/json');

include("./db.php");

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

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the POST request
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rePassword = $_POST["rePassword"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mobile = $_POST["mobile"];
    $role = $_POST["role"];

    // Validate and sanitize data (you may want to implement more robust validation)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);

    // Hash the password before storing it in the database (you should never store plain passwords)
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the users table
    $sql = "INSERT INTO users (username, password, email, role) VALUES ('$email', '$password', '$email', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the user_id of the inserted record
        $user_id = $conn->insert_id;

        // SQL query to insert data into the user_details table
        $sqlDetails = "INSERT INTO user_details (user_id, full_name, date_of_birth, mobile) VALUES ('$user_id', '$firstname $lastname', '2024-01-01', '$mobile')";

        if ($conn->query($sqlDetails) === TRUE) {
            // Return a success response
            echo json_encode(["success" => true, "message" => "User added successfully"]);
        } else {
            // Return an error response
            echo json_encode(["success" => false, "message" => "Error inserting user details"]);
        }
    } else {
        // Return an error response
        echo json_encode(["success" => false, "message" => "Error inserting user"]);
    }

    // Close the database connection
    $conn->close();
} else {
    // Return an error response for unsupported request method
    echo json_encode(["success" => false, "message" => "Unsupported request method"]);
}
?>
