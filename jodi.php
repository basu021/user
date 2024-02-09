<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Insert Jodi Data</title>
</head>
<body>

<div class="container mt-5">
    <h2>Insert Jodi Data</h2>
    
    <?php
    // Assuming you have a database connection established
    include './assets/php/db.php';
    include_once './assets/php/auth.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bazaar_id = $_POST['bazaar_id'];
        $week_name = $_POST['week_name'];
        $mon = $_POST['mon'];
        $tue = $_POST['tue'];
        $wed = $_POST['wed'];
        $thu = $_POST['thu'];
        $fri = $_POST['fri'];
        $sat = $_POST['sat'];
        $sun = $_POST['sun'];

        $sql = "INSERT INTO jodi (bazaar_id, week_name, mon, tue, wed, thu, fri, sat, sun) 
                VALUES ('$bazaar_id', '$week_name', '$mon', '$tue', '$wed', '$thu', '$fri', '$sat', '$sun')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Data inserted successfully</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
        }
    }
    ?>

    <form method="post" action="jodi.php">
        <div class="form-group">
            <label for="bazaar_id">Bazaar ID:</label>
            <input type="text" class="form-control" id="bazaar_id" name="bazaar_id" required>
        </div>
        <div class="form-group">
            <label for="week_name">Week Name:</label>
            <input type="text" class="form-control" id="week_name" name="week_name" required>
        </div>
        <div class="form-group">
            <label for="mon">Monday:</label>
            <input type="text" class="form-control" id="mon" name="mon" >
        </div>
        <div class="form-group">
            <label for="tue">Tuesday:</label>
            <input type="text" class="form-control" id="tue" name="tue" >
        </div>
        <div class="form-group">
            <label for="wed">Wednesday:</label>
            <input type="text" class="form-control" id="wed" name="wed" >
        </div>
        <div class="form-group">
            <label for="thu">Thursday:</label>
            <input type="text" class="form-control" id="thu" name="thu" >
        </div>
        <div class="form-group">
            <label for="fri">Friday:</label>
            <input type="text" class="form-control" id="fri" name="fri" >
        </div>
        <div class="form-group">
            <label for="sat">Saturday:</label>
            <input type="text" class="form-control" id="sat" name="sat">
        </div>
        <div class="form-group">
            <label for="sun">Sunday:</label>
            <input type="text" class="form-control" id="sun" name="sun" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
