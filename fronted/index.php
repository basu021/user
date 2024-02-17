<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Satka Matka</title>
    <style>
        .sticky-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            z-index: 9999;
            /* Ensure the buttons appear on top of other content */
        }

        .sticky-buttons a {
            margin-top: 10px;
            /* Adjust as needed */

        }

        .sticky-buttons a img {
            width: 50px;
            height: 50px;
        }

        @media (max-width: 576px) {

            /* Adjust styles for smaller screen sizes */
            .sticky-buttons {
                bottom: 10px;
                right: 10px;
            }
        }

        .res1,
        .res2,
        .res3 {
            color: azure !important;
        }

        hr {
            border-top: 2px solid #efda9c;
        }

        .btn,
        .btn2 {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            width: fit-content;
        }

        h1 {
            font-size: 2rem;
            padding: 5px;
        }

        .reshe1 h1 {
            font-size: 1.2rem;

        }

        .reshe1 {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .restim {
            font-size: 16px;
        }

        /* hazae line card */

        .hazarcard {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin: 0;
            /* background-color: #282c34; */

        }

        .card {
            width: 150px;
            height: 200px;
            border: 2px solid #fff;
            border-radius: 10px;
            background-repeat: no-repeat;
            background-size: contain;
            background-color: #fff;
            color: #141414;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }

        .hazarcard .card1 {
            background-image: url('card1.png');
        }

        .hazarcard .card2 {
            background-image: url('card2.png');
        }

        .hazarcard .card3 {
            background-image: url('card3.png');
        }

        .hazarcard .card .suit {
            font-size: 24px;
        }

        .hazarcard .card .rank {
            font-size: 36px;
            font-weight: bold;
        }

        a:hover {
            color: #ffffff;
            font-size: 18px;
            /* animation */
            transition: 0.5s all all;
        }

        a {
            color: #ffffff;
            text-decoration: none;
        }

        .hlt {
            background-color: #a44040;

        }


        .blink {
            animation: blinker 1s linear infinite;
            color: red;
            font-weight: 800;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sticky-buttons">
            <a href="https://t.me/+0fSTKg2V5mg5NDll" class="telegram-button" target="_blank">
                <img src="telegram-icon.png" alt="Telegram">
            </a>
            <a href="https://wa.me/+9181035455537" class="whatsapp-button" target="_blank">
                <img src="whatsapp-icon.png" alt="WhatsApp">
            </a>
        </div>
        <div class="firstcontainer">
            <div class="logo-container">
                <img src="uploads/logoD.JPEG" alt="Your Logo" class="logo">
            </div>

            <div class="highlight1">
                <div class="row">
                    <div class="col-md-1">
                        <img src="uploads/dpboss.jpg" alt="afe" class="highlightimg">
                    </div>
                    <div class="col-md-11">
                        <marquee direction="" style="color: white;">
                            <?php
                            include 'php/conn.php';
                            $query = "SELECT * FROM frontend";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo $row['scroll_text'];
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </marquee>
                    </div>
                </div>
            </div>

            <!-- Parent 2 Container -->
            <div class="seccontainer">

                <h1 class="sech1">♣SatkaMatkaRB | Satta Matka | Kalyan Matka | Online Matka Result ♣</h1>
                <p class="secp">
                    <?php
                    echo $row['welcome_text']; ?>
                </p>
            </div>
            <div class="firstcontainer">
                <div class="logo-container">
                    <h1 class="playh1">Play & Win</h1>
                    <button class="btn">Download App <i class="fa fa-arrow-down"></i></button>
                </div>
                <!-- Parent 3 Container -->
                <div class="thirdcontainer text-center">
                    <h1 class="sec3h1">Today Lucky Number</h1>
                    <table class="table1" id="luckyNumbersTable">
                        <tr style="color: #efda9c; font-size: 22px;">
                            <th>Golden Ank</th>
                            <th>Motor Patti</th>
                        </tr>
                    </table>
                </div>
                <!-- Parent 4 Container -->
                <div class="fourcontainer text-center">
                    <h1 class="sec4h1">♠ SATTA MATKA LIVE RESULT ♠</h1>
                    <button class="btn2"><a href="index.php" style="color: black;"><i class="fa fa-refresh"
                                aria-hidden="true"></i> Refresh Result
                        </a></button>
                    <hr>
                    <!--                
<hr>
                <container class="res1">
<div class="">                    <h1 class="Resh1">KALYAN</h1>
                    <p><span class="blink"> Live </span> <br>123-64-248</p>
                    <p class="time4.1">(08:00 AM - 08:00 PM)</p> </div>
                </container>
                <hr>
-->
                    <?php
                    $query1 = "SELECT * FROM bazaar";
                    $result1 = $conn->query($query1);

                    if ($result1->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result1->fetch_assoc()) {
                            echo '<container class="res1 ' . htmlspecialchars($row['bazaar_name']) . '">';
                            echo '<h1 class="Resh1">' . htmlspecialchars($row['bazaar_name']) . '</h1>';
                            echo '<p> ' . htmlspecialchars($row['bazaar_result']) . '</p>';
                            //$openTime = DateTime::createFromFormat('H:i', $row['bazaar_opentime']);
//$closeTime = DateTime::createFromFormat('H:i', $row['bazaar_closetime']);
                    
                            //if ($openTime !== false && $closeTime !== false) {
//    echo '<p class="time4.1">(' . $openTime->format('h:i A') . ' - ' . $closeTime->format('h:i A') . ')</p>';
//} else {
//echo "Invalid";
//    echo '<p class="time4.1">(' . htmlspecialchars($row['bazaar_opentime']) . ' - ' . htmlspecialchars($row['bazaar_closetime']) . ')</p>';
//}
//confirm top
                    
                            date_default_timezone_set('Asia/Kolkata');

                            //$openTime = DateTime::createFromFormat('H:i', '04:00');
//$closeTime = DateTime::createFromFormat('H:i', '15:00');
                            $openTime = DateTime::createFromFormat('H:i', $row['bazaar_opentime']);
                            $closeTime = DateTime::createFromFormat('H:i', $row['bazaar_closetime']);

                            if ($openTime !== false && $closeTime !== false) {
                                $currentTime = new DateTime(); // Get the current time in the 'Asia/Kolkata' timezone
                    
                                // Create time intervals for 15 minutes before and after
                                $beforeInterval = new DateInterval('PT15M');
                                $afterInterval = new DateInterval('PT15M');

                                // Calculate the time range
                                $beforeOpenTime = clone $openTime;
                                $beforeOpenTime->sub($beforeInterval);

                                $afterCloseTime = clone $closeTime;
                                $afterCloseTime->add($afterInterval);

                                // Check if the current time is within the calculated range
                                if ($currentTime >= $beforeOpenTime && $currentTime <= $afterCloseTime) {

                                    echo '<p class="time4.1">(' . $openTime->format('h:i A') . ' - ' . $closeTime->format('h:i A') . ')</p>';
                                    echo '<span class="blink"> Live </span> <br>';
                                    // echo '<span>Hello</span><br>';
                                } else {
                                    echo '<p class="time4.1">(' . $openTime->format('h:i A') . ' - ' . $closeTime->format('h:i A') . ')</p>';
                                }
                            } else {
                                // echo "Invalid";
                                echo '<p class="time4.1">(' . htmlspecialchars($row['bazaar_opentime']) . ' - ' . htmlspecialchars($row['bazaar_closetime']) . ')</p>';

                                // Provide appropriate handling for invalid time formats
                            }

                            echo '</container>';
                            echo '<hr>';
                        }
                    } else if ($result1->num_rows == 0) { ?>
                            <hr>
                            <container class="res1">
                                <h1 class="Resh1">KALYAN</h1>
                                <p>Loading...</p>
                                <p class="time4.1">(03:45 PM - 05:45 PM)</p>
                            </container>
                            <hr>
                            <container class="res2">
                                <h1 class="Resh1">KAMDHENU</h1>
                                <p class="greenresult">113-5</p>
                                <p class="time4.1">(03:45 PM - 05:45 PM)</p>
                            </container>
                            <hr>

                            <<?php } else {
                        echo "No results found";
                    }
                    ?> </div>

                <!-- Parent 5 Container -->
                <div class="fourcontainer text-center">
                    <h1 class="sec5h1">♣ JOIN WWW. SATKAMATKARB .ONLINE ♣</h1>
                    <H2 class="text-success">INTRODUCTION TO SATTA MATKA</H2>
                    <p class="secp">Satta Matka is a popular form of gambling that originated in India. It is a game
                        of chance that involves placing bets on the opening and closing rates of cotton that are
                        transmitted from the New York Cotton Exchange. Over time, Satta Matka evolved to include
                        various other forms of gambling, such as betting on numbers and cards. Today, it has become
                        one of the most renowned and exciting gambling games in the world</p>
                </div>
                <!-- Parent 6 Container -->
                <div class="seccontainer">

                    <p class="text-warning text-center">KALYAN MATKA | MATKA RESULT | MADHURI NIGHT RESULT | MATKA
                        PANA JODI
                        TODAY |TODAY SATTA MATKA RESULT | MATKA PATTI JODI NUMBER | MATKA RESULTS | MATKA CHART |
                        MATKA JODI |
                        SATTA COM | FULL RATE GAME |MATKA GAME | ALL MATKA RESULT LIVE ONLINE | MATKA RESULT |
                        KALYAN MATKA
                        RESULT | DPBOSS MATKA 143 | MATKA TIPS | FIX MATKA NUMBER | SATTA GUESSING | 220 PATTI |
                        JANTA MATKA
                        RESULT | MILAN NIGHT RESULT | MADHURI DAY RESULT | MORNING SYNDICATE RESULT | MILAN DAY
                        CHART WITH PANEL
                        | RATAN KHATRI | DPBOSS RESULTS | BALAJI DAY CHART | KALYAN MATKA RESULT TODAY | TODAY SATTA
                        NUMBER |
                        DPBOSS ONLINE | FASTEST SATTA MATKA RESULT | ALL MATKA RESULTS | ONLINE SATTA MATKA | KALYAN
                        BETTING |
                        FINAL ANK | MATKARAJA | TIME MATKA |
                        220 PATTI WIKI | KING BAZAR | MATKA BOOKING | DHANGAME | RS GAME | MATKA NOW</p>
                </div>
                <!-- Parent 7 Container -->
                <div class="seccontainer">

                    <p class="text-warning text-center">Do you know Matka is legal or illegal in your country? At
                        dpbossonline.com , we are enthusiastically discussing with Kalyan Matka how to get
                        started with Online Matka and get live matka results quickly. Satta Matka is the most
                        logically used
                        word in the Matka industry, and Hindi is written as सट्टा मटका. Online Satta Matka website
                        dpbossonline.com
                        try your luck! We are leading the online Matka industry with our top-notch matka results you
                        can trust.
                        We are on the India's top dpboss website for Matka Online, Matka Chart, Market, Panel Chart,
                        Fix Matka
                        Jodi,
                        RB Satka Matka, Indian Matka, Kalyan Result, matka guessing, matka bogs updates, Matka
                        Result, osgames,
                        and more.</p>
                </div>


            </div>
            <!-- Parent 8 Container -->
            <div class="seccontainer">

                <h2 class="text-warning text-center">♦ World ka Live and Fastest Satta Matka Result Website ♦</h2>
            </div>
            <div class="fourcontainer hlt text-center">
                <hr>
                <container class="reshe1"><button class="resbtn1" id="leftButton"><a
                            href="panel.php?id=32">Panel</a></button>
                    <div class="center-content">
                        <h1>Kalyan Matka</h1>
                        <p class="resnum"><span class="blink"> Live </span> <br>32</p>
                        <p class="restim">(10:20 AM - 11:20 PM)</p>
                    </div><button class="resbtn2" id="rightButton"><a href="jodi.php?id=32">Jodi</a></button>
                </container>
                <hr>
            </div>
            <?php
            // Fetch bazaar names from the database
            $sql = "SELECT id, bazaar_name, bazaar_opentime, bazaar_closetime FROM bazaar";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="fourcontainer text-center">';
                    echo '<hr>';
                    echo '<container class="reshe1">';
                    echo '<button class="resbtn1" id="leftButton"><a href="panel.php?id=' . $row["id"] . '">Panel</a></button>';  ////////////Panel Linking Place////////////
                    echo '<div class="center-content">';
                    echo '<h1>' . $row["bazaar_name"] . '</h1>';
                    echo '<p class="resnum">' . $row["id"] . '</p>';
                    echo '<p class="restim">(' . $row["bazaar_opentime"] . ' - ' . $row["bazaar_closetime"] . ')</p>';
                    echo '</div>';
                    echo '<button class="resbtn2" id="rightButton"><a href="jodi.php?id=' . $row["id"] . '">Jodi</a></button>';
                    echo '</container>';
                    echo '<hr>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            ?>
            <h1 class="sec4h1 mt-4">♠ MAIN STARLINE ♠</h1>
            <div class="hazarcard">
                <div class="card card1">
                    <div class="rank">A</div>
                    <div class="suit">&#9824;</div>
                </div>

                <div class="card card2">
                    <div class="rank">K</div>
                    <div class="suit">&#9827;</div>
                </div>

                <div class="card card3">
                    <div class="rank">Q</div>
                    <div class="suit">&#9829;</div>
                </div>
            </div>
            <div class="seccontainer">

                <h2 class="text-warning text-center">♦ RB SatkaMatka NET PAID VIP GAME ♦</h2>
                <hr>
                <H2 class="text-success text-center">Live Time And Date India</H2>
                <hr>
                <p class="secp">The one who is connected to us till today has become rich in just one time, today in
                    Kalyan Bazaar, a single pair of 2 leaves
                    जो आज तक हमसे जुड़ा है वो एक ही समय में अमीर बन गया है, आज कल्याण बाजार में 1 पत्तों का एक जोड़ा</p>
                <hr>
                <h2 class="text-danger text-center">Leaked directly from Matka office manager [101% accurate]
                    सीधे मटका कार्यालय प्रबंधक से लीक हुआ [101% सटीक]</h2>
            </div>


            <!-- Bazar Panel Chart -->
            <div class="seccontainer">

                <h2 class="text-warning text-center">♦ RB Panel Chart 2024 ♦</h2>
                <hr>
                <h1 style="font-style: normal; color: azure; font-weight: 600; text-decoration: none;"
                    class="sec4h1 mt-4">Kalyan Bazar Panel </h1>
                <h1 style="font-style: normal; color: azure; font-weight: 600; text-decoration: none;"
                    class="sec4h1 mt-4">Ghaziyabad Bazar Panel </h1>
                <hr>
                <p class="secp">The one who is connected to us till today has become rich in just one time, today in
                    Kalyan Bazaar, a single pair of 2 leaves
                    जो आज तक हमसे जुड़ा है वो एक ही समय में अमीर बन गया है, आज कल्याण बाजार में 1 पत्तों का एक जोड़ा</p>
                <hr>
                <h2 class="text-danger text-center">Leaked directly from Matka office manager [101% accurate]
                    सीधे मटका कार्यालय प्रबंधक से लीक हुआ [101% सटीक]</h2>
            </div>
            <!-- Bazar Jodi CHart -->
            <div class="seccontainer">

                <h2 class="text-warning text-center">♦ RB Jodi Chart 2024 ♦</h2>
                <hr>
                <h1 style="font-style: normal; color: azure; font-weight: 600; text-decoration: none;"
                    class="sec4h1 mt-4">Kalyan Bazar Jodi Chart </h1>
                <h1 style="font-style: normal; color: azure; font-weight: 600; text-decoration: none;"
                    class="sec4h1 mt-4">Ghaziyabad Bazar Jodi Chart </h1>
                <hr>
                <h2 class="text-danger text-center">♥ Play Online Satta Matka Games on RB Satka Matka Online to earn
                    money ♥</h2>
                <hr>
                <p class="secp">Now it is time for the players to switch on the more reliable and trusted website like
                    dpboss online. The main objective of our site is to show the live kalyan matka result. The results
                    that we display on our site are hundred percent true and accurate. Our website welcomes all
                    different types of gamers, whether you are a brand-new player with no experience or a seasoned
                    veteran with years of playing under your belt.

                    We are committed to offering top-notch user interfaces and high-quality games that give players a
                    realistic gaming experience. Here, we offer daily premium tips and advice from industry
                    professionals so that they can succeed in every game. You can access our website and play all the
                    most popular games from the convenience of your home. You can play these games without worrying
                    about your information and data thanks to the round-the-clock customer service.

                    If you face any kind of problem just give us a call and we will provide you with a proper solution.
                    Your time is valuable and we are trying everything to make every second worth it. With the
                    assistance of professionals and well-known astrologers, we are offering all forms of assistance to
                    make your work easier, including jodi charts, a matka guessing forum, and so on.

                    For this reason, the information on our website has been carefully created, and everything you read
                    or see there will aid you in playing the game. Our website offers advice to help you get an edge on
                    the competition and be motivated to achieve in addition to a forum with our experts where you may
                    play anything you like! With unique features like Guessing Forums blogs and experts, RB Satka Matka
                    Online is the premier gaming forum.</p>
                <hr>

            </div>








            <!-- End -->
            <div class="seccontainer">

                <p class="text-warning text-center">Do you know Matka is legal or illegal in your country? At
                    satkamatkarb.com , we are enthusiastically discussing with Kalyan Matka how to get
                    started with Online Matka and get live matka results quickly. Satta Matka is the most logically used
                    word in the Matka industry, and Hindi is written as सट्टा मटका. Online Satta Matka website
                    satkamatkarb.online
                    try your luck! We are leading the online Matka industry with our top-notch matka results you can
                    trust.
                    We are on the India's top dpboss website for Matka Online, Matka Chart, Market, Panel Chart, Fix
                    Matka
                    Jodi,
                    RB Satka Matka, Indian Matka, Kalyan Result, matka guessing, matka bogs updates, Matka Result,
                    osgames,
                    and more.</p>
            </div>
            <div class="seccontainer">


                <p class="text-warning text-center">हम आपके भरोसेमंद मटका बैंकर/बक्की हैं जैसा कि आप जानते हैं, मैं भारत
                    में मटका व्यवसाय कर मैं तुम्हारा दीपिवाश हूं आप मुझ पर भरोसा कर सकते हैं क्योंकि मैं एकमात्र व्यक्ति
                    हूं जो आपके गेम का परिणाम 5 मिनट के भीतर प्राप्त कर देगा। ऑनलाइन सट्टा मटका (SATTA MATKA) की
                    लोकप्रियता ऐप की शुरुआत के साथ काफी बढ़ गई - जुए का आनंद लेने का सबसे सुविधाजनक तरीका आराम से रात को
                    अपने क्षेत्र में बैठ कर। ऐप की सुविधा से नाइट गेम्स में और खिलाड़ी जुड़ गए। इसके अलावा, इसकी वॉलेट
                    सुविधा ने उपयोगकर्ताओं को तत्काल जमा और निकासी की अनुमति दी, जो खिलाड़ियों द्वारा अत्यधिक सराहनीय
                    है। इसके अतिरिक्त, इसमें धोखाधड़ी, नकद लेन-देन की त्रुटियों और खातों के मैनुअल लेज़र को बनाए रखने की
                    संभावना को समाप्त कर दिया।.</p>


            </div>

        </div>


        <?php
        // Close the database connection
        $conn->close();
        ?>

        <!-- 2nd Stage -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Function to fetch and display lucky numbers
                function fetchLuckyNumbers() {
                    fetch('php/fetch_lucky_numbers.php')
                        .then(response => response.json())
                        .then(data => {
                            const table = document.getElementById('luckyNumbersTable');

                            data.forEach(row => {
                                const newRow = table.insertRow(table.rows.length);
                                const cell1 = newRow.insertCell(0);
                                const cell2 = newRow.insertCell(1);

                                // Apply style to the cells
                                cell1.style.color = 'aliceblue';
                                cell2.style.color = 'aliceblue';

                                cell1.innerHTML = row.goldenAnk;
                                cell2.innerHTML = row.motorPatti;
                            });
                        })
                        .catch(error => console.error('Error fetching lucky numbers:', error));
                }

                // Call the function to fetch and display lucky numbers
                fetchLuckyNumbers();
            });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
</body>

</html>