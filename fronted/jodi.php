<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        .joditab {
            display: flex;
            justify-content: center;
            align-items: center;

            scroll-margin: 20px;
            margin-top: 1px;
            padding: 20px;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 30px;
            text-align: center;
            font-size: 25px;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            color: white;
        }

        .tbtr {
            text-align: center;
        }

        .weektext {
            font-size: 16px;
        }
    </style>
    <title>Days Table</title>
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
            <h1 class="sec3h1">
                
            <?php if (isset($_GET['id'])) {
                        $bazaar_id = $_GET['id'];

                        include_once('./db.php');
                        $sql = "SELECT bazaar_name FROM bazaar WHERE id = $bazaar_id ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
        $bazaar_name = $row['bazaar_name'];

        // Now you can use $bazaar_name as needed
        echo "$bazaar_name Jodi Chart";

                        } else {
                        }


                        ?>
        
        </h1>
        </div>
        <div class="jodisecp">
            <p class="jodidesc">The most fascinating and exciting game included in the list of Regular bazaars is Time
                Kalyan. With Dp Boss Online you can get easy access to all the satta matka tips and guides that can make
                your journey more smooth. The inclusion in the list of regular bazaars made the availability of Time
                Kalyan twice a day. The opening time of the game is 09:30 AM and the close time of the game is 11:45 AM.
                You can easily refer to the Time Kalyan Jodi chart to understand various facts about numbers that can
                help you in making future predictions. If you want to add more to your excitement balance then you must
                definitely try this game of luck.</p>
        </div>
        <container class="joditab">
            <table>
                <thead>
                    <tr>
                        <th>Week</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>
                <tbody class="tbtr">
                    <!-- Add your table rows (data) here -->
                    <!-- Example row: -->

                    
                        <?php

                        // Fetch all entries by timestamp
                        $sql = "SELECT * FROM panel WHERE bazar_id = $bazaar_id ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output the data in the table for each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td class="weektext">' . $row["weekvalue"] . '</td>';

                                $redNumbers = ["11", "22", "33", "44", "55", "66", "77", "88", "99", "00", "16", "61", "50", "05", "27", "72", "49", "94", "38", "83"];

                                echo '<td style="color: ' . (in_array($row["monday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["monday_jodi"] . '</td>';
                                echo '<td style="color: ' . (in_array($row["tuesday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["tuesday_jodi"] . '</td>';
                                echo '<td style="color: ' . (in_array($row["wednesday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["wednesday_jodi"] . '</td>';
                                echo '<td style="color: ' . (in_array($row["thursday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["thursday_jodi"] . '</td>';
                                echo '<td style="color: ' . (in_array($row["friday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["friday_jodi"] . '</td>';
                                echo '<td style="color: ' . (in_array($row["saturday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["saturday_jodi"] . '</td>';
                                echo '<td style="color: ' . (in_array($row["sunday_jodi"], $redNumbers) ? 'red' : 'white') . ';">' . $row["sunday_jodi"] . '</td>';

                                echo '</tr>';

                            }
                            ?>
                            <?php
                        } else if ($result->num_rows == 0) {
                            echo '<td colspan="8">No data found</td>';
                        } else {
                            echo "No jodi data found for the specified ID";
                        }
                    } else {
                        echo "No ID provided";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </container>
    </div>
</body>

</html>