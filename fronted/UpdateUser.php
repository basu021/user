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
    $user_id = $_POST["user_id"];
    $email = $_POST["email"];
    // $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $mobile = $_POST["mobile"];
    $role = $_POST["role"];
    $dob = $_POST["dob"];

    // Validate and sanitize data (you may want to implement more robust validation)
    $user_id = filter_var($user_id, FILTER_VALIDATE_INT);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);

    // Hash the password before storing it in the database (you should never store plain passwords)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to update data in the users table
    $sql = "UPDATE users SET username = '$email', email = '$email', role = '$role' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // SQL query to update data in the user_details table
        $sqlDetails = "UPDATE user_details SET full_name = '$fullname', mobile = '$mobile', date_of_birth = '$dob' WHERE user_id = $user_id";

        if ($conn->query($sqlDetails) === TRUE) {
            // Return a success response
            echo json_encode(["success" => true, "message" => "User updated successfully"]);
        } else {
            // Return an error response
            echo json_encode(["success" => false, "message" => "Error updating user details"]);
        }
    } else {
        // Return an error response
        echo json_encode(["success" => false, "message" => "Error updating user"]);
    }

    // Close the database connection
    $conn->close();
} else {
    // Return an error response for unsupported request method
    echo json_encode(["success" => false, "message" => "Unsupported request method"]);
}
?>
