<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Starter | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Uss" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>
<!-- body start -->
<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include './assets/components/sidebar.php'; ?>
        <!-- Content -->
        <div class="content-page">
            <div class="content">
                <!-- Start Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Add panel</h1>
                            <form action="./assets/php/starline-dataadd.php" method="post">
                                <?php
                                $hours = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
                                ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Select Starline:</label>
                                        <select class="form-control" name="starlineid" id="starlineid">
                                            <!-- Options will be dynamically populated using JavaScript -->
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="selectedDate">Date:</label>
                                        <select class="form-control" name="selectedDate" id="selectedDate">
                                            <!-- Options will be dynamically populated using JavaScript -->
                                        </select>
                                    </div>
                                    <div class="row">
    <?php
    foreach ($hours as $hour) {
        echo "<div class='col-md-4'>";
        echo "<label>Hour {$hour}:</label>";
        echo "<input type='text' class='form-control' name='{$hour}_open' id='{$hour}_open' placeholder='{$hour} Open' >";
        echo "<input type='text' class='form-control' name='{$hour}_jodi' id='{$hour}_jodi' placeholder='{$hour} Jodi' >";
        echo "</div>";
    }
    ?>
</div>

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container -->
            </div> <!-- content -->
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; SattaMatka By <a href="">Uss</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
    </div>
    <!-- Right bar overlay -->
    <div class="rightbar-overlay"></div>
    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to fetch dates based on selected starline
            function fetchDates(starlineId) {
                $.ajax({
                    url: 'https://satkamatkarb.online/user/assets/php/fetch-date.php?starlineid=' + starlineId,
                    type: 'GET',
                    success: function (response) {
                        // Parse the response as JSON
                        var dates = JSON.parse(response);
                        // Clear existing options
                        $('#selectedDate').empty();
                        // Populate date dropdown with fetched dates
                        dates.forEach(function (date) {
                            $('#selectedDate').append('<option value="' + date + '">' + date + '</option>');
                        });
                        // Fetch panel data for the selected starline and date
                        fetchPanelData(starlineId, $('#selectedDate').val());
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        // Handle error if needed
                    }
                });
            }

            // Function to fetch panel data based on selected starline and date
            function fetchPanelData(starlineId, selectedDate) {
                $.ajax({
                    url: './assets/php/fetch-starline-by-date.php',
                    type: 'POST',
                    data: { starlineId: starlineId, selectedDate: selectedDate },
                    dataType: 'json',
                    success: function (response) {
    console.log("Panel data response:", response); // Log the response to console
    // Populate input fields with fetched panel data
    $.each(response, function (hour, data) {
        $('#' + hour + '_open').val(data.hour_open);
        $('#' + hour + '_jodi').val(data.hour_jodi);
    });
},

                    error: function (xhr, status, error) {
                        console.error(error);
                        // Handle error if needed
                    }
                });
            }

            // Fetch starline and populate the dropdown
            $.ajax({
                type: "POST",
                url: "./assets/php/fetch-starline-info.php", // Replace with the actual file handling the request
                dataType: "json",
                success: function (response) {
                    if (response.success && response.starline.length > 0) {
                        var dropdown = $("#starlineid");

                        $.each(response.starline, function (index, starline) {
                            dropdown.append($("<option>").val(starline.starline_id).text(starline.starline_name));
                        });

                        // Event listener for change in starline selection
                        dropdown.change(function () {
                            var starlineId = $(this).val();
                            fetchDates(starlineId); // Fetch dates based on selected starline
                        });

                        // Initial fetch of dates based on default starline selection
                        fetchDates(dropdown.val());
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });

            // Event listener for change in selected date
            $('#selectedDate').change(function () {
                var starlineId = $('#starlineid').val();
                var selectedDate = $(this).val();
                fetchPanelData(starlineId, selectedDate); // Fetch panel data based on selected starline and date
            });

            // Event listener for form submission
            $('form').submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                // Serialize form data
                var formData = $(this).serialize();

                // Submit form data using AJAX
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success response if needed
                        console.log("Form submitted successfully.");
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        // Handle error if needed
                    }
                });
            });

            // Function to calculate the sum of digits
            function calculateSumOfDigits(value) {
                return value.toString().split('').reduce(function (acc, digit) {
                    return acc + parseInt(digit);
                }, 0);
            }

            // Function to get the rightmost digit
            function getRightmostDigit(value) {
                return parseInt(value.toString().slice(-1));
            }

            // Event listener for open and close input fields
            $('.form-row input[id$="_open"]').on('input', function () {
                var day = $(this).attr('id').split('_')[0];
                var openSum = calculateSumOfDigits($('#' + day + '_open').val());

                // Set the jodi value based on the condition
                $('#' + day + '_jodi').val(getRightmostDigit(openSum));
            });
        });
    </script>
</body>
</html>
