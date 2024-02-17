<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Table Example</title>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
    
  }
  th{
    background-color: #F5C549;
  }
  th.sub-column-wide {
    width: 100px; /* Adjust the width as needed */
  }
  td{
    background-color: aliceblue;
  }
  .date1{
    background-color:#F5C549;
    height: 50px;
    width: 165px;
  }

  tr td:nth-child(2),
  tr td:nth-child(4),
  tr td:nth-child(5),
  tr td:nth-child(7),
  tr td:nth-child(8),
  tr td:nth-child(10),
  tr td:nth-child(11),
  tr td:nth-child(13),
  tr td:nth-child(14),
  tr td:nth-child(16),
  tr td:nth-child(17),
  tr td:nth-child(19),
  tr td:nth-child(20),
  tr td:nth-child(22)
  {
    width: 1px;
    word-break: break-all;
  }
</style>
</head>
<body>
<div class="container">
        <div class="logo-container1">
            <img src="uploads/logoD.JPEG" alt="Your Logo" class="logo">
            <!---- <h1 class="playh1">Play & Win</h1>
          <button class="btn">Download App <i class="fa fa-arrow-down"></i></button> -->
        </div>
        <container class="reshejodi1">
            <button class="resbtn1" id="leftButton"><a href="index.php">Home</a></button>
            <button class="resbtn2" id="rightButton">Bottom</button>
        </container>
        <div class="thirdcontainer1 text-center">
            <h1 class="sec3h1">Time Kalyan Panel Chart</h1>
        </div>
        <div class="jodisecp">
            <p class="jodidesc">The most fascinating and exciting game included in the list of Regular bazaars is Time
                Kalyan. With Satka Matka RB Online you can get easy access to all the satta matka tips and guides that can make
                your journey more smooth. The inclusion in the list of regular bazaars made the availability of Time
                Kalyan twice a day. The opening time of the game is 09:30 AM and the close time of the game is 11:45 AM.
                You can easily refer to the Time Kalyan Panel chart to understand various facts about numbers that can
                help you in making future predictions. If you want to add more to your excitement balance then you must
                definitely try this game of luck.</p>
        </div>
        <?php
// Include database connection and any necessary validation functions
include_once './db.php';

// Assuming you have already connected to the database ($conn)

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data from the panel table based on the provided ID
    $stmt = $conn->prepare("SELECT * FROM panel WHERE bazar_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there is data
    if ($result->num_rows > 0) {
        // Start building the HTML table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th rowspan="2">Date</th>';

        // Loop to generate day headers
        $days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
        foreach ($days as $day) {
            echo "<th colspan='3'>$day</th>";
        }
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            // Display date column
            echo '<td class="date1">' . $row['weekvalue'] . '</td>';
        
            // Loop to display data for each day
            foreach ($days as $day) {
              $columnName = "{$day}_jodi";
              $isRed = in_array($row[$columnName], ["11", "22", "33", "44", "55", "66", "77", "88", "99", "00", "16", "61", "50", "05", "27", "72", "49", "94", "38", "83"]);
                for ($i = 1; $i <= 3; $i++) {
        
                    if ($i == 1) {
                        $columnName = "{$day}_open";
                    } elseif ($i == 2) {
                        $columnName = "{$day}_jodi";
                        // Check if day_jodi is one of the specified values
                        
                    } elseif ($i == 3) {
                        $columnName = "{$day}_close";
                    }
        
                    // Apply styles based on the condition
                    $style = $isRed ? 'color: red;' : '';
                    echo '<td style="' . $style . '">' . $row[$columnName] . '</td>';
                }
            }
        
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        // If there is no data for the provided ID
        echo 'No data found for the given ID.';
    }

    // Close the statement
    $stmt->close();
} else {
    // If 'id' is not set in the URL
    echo 'ID parameter is missing in the URL.';
}

// Close the database connection
$conn->close();
?>

</div>
</body>
</html>
