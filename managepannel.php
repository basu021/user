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
    <style>

        .menu-con {
            margin-top: 50px;
        }
        .menu-con > * {
            /* border: 1px solid red; */
            
        }

        .menum{
            padding: 10px 20px;
            text-align: center;
        }
        .menum > a {
            padding: 10px 20px;
        }
    </style>

</head>

<!-- body start -->

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">


                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                            theuser <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="auth-logout.html" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="16">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                        </button>

                    </a>
                </li>

                <li>
                    <h4 class="page-title-main">Starter</h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include './assets/components/sidebar.php'; ?>


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Add panel</h1>
                            <form action="./assets/php/panel-datamanage.php" method="post">
                                <?php
                                $days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
                                ?>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Select Bazaar:</label>
                                        <select class="form-control" name="bazarid" id="bazarid">
                                            <!-- Options will be dynamically populated using JavaScript -->
                                        </select>
                                        
                                    </div>

                                    <div class="form-group col-md-12">
                                    <label>Select Week:</label>
<select class="form-control" name="selectedWeek" id="selectedWeek">
    <!-- Options will be dynamically populated using JavaScript -->
</select>
    
</div>
                                    <div class="row">
                                        <?php
                                        foreach ($days as $day) {
                                            echo "<div class='col-md-4'>";
                                            echo "<label>{$day}:</label>";

                                            echo "<input type='text' class='form-control' name='{$day}_open' id='{$day}_open' placeholder='{$day} Open' >";
                                            echo "<input type='text' class='form-control' name='{$day}_jodi' id='{$day}_jodi' placeholder='{$day} Jodi' >";
                                            echo "<input type='text' class='form-control' name='{$day}_close' id='{$day}_close' placeholder='{$day} Close' >";

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

            <!-- Footer Start -->
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

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include './assets/components/msidebar.php' ?>

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
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
    $('.form-row input[id$="_open"], .form-row input[id$="_close"]').on('input', function () {
        var day = $(this).attr('id').split('_')[0];
        var openSum = calculateSumOfDigits($('#' + day + '_open').val());
        var closeSum = 0;

        var closeValue = $('#' + day + '_close').val();
        if (closeValue) {
            closeSum = calculateSumOfDigits(closeValue);
        }

        // Set the jodi value based on the condition
        if (closeValue) {
            $('#' + day + '_jodi').val('' + getRightmostDigit(openSum) + getRightmostDigit(closeSum));
        } else {
            $('#' + day + '_jodi').val(getRightmostDigit(openSum));
        }
    });
});
$(document).ready(function () {
    // Fetch bazaars and populate the dropdown
    $.ajax({
        type: "POST",
        url: "./assets/php/fetch-bazaar-info.php",
        dataType: "json",
        success: function (response) {
            if (response.success && response.bazaars.length > 0) {
                var bazarDropdown = $("#bazarid");

                $.each(response.bazaars, function (index, bazaar) {
                    bazarDropdown.append($("<option>").val(bazaar.bazaar_id).text(bazaar.bazaar_name));
                });

                // Trigger the change event for the Bazaar dropdown to fetch weeks initially
                bazarDropdown.trigger('change');
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: " + status + " - " + error);
        }
    });

    
    // Event listener for the Bazaar dropdown
    $('#bazarid').on('change', function () {
        var selectedBazarId = $(this).val();

        // Fetch weeks based on the selected Bazaar
        $.ajax({
            type: "GET",
            url: "./assets/php/fetch-weeks.php",
            data: { bazarid: selectedBazarId },
            success: function (response) {
                var weekDropdown = $("#selectedWeek");
                weekDropdown.empty();

                // Check if the response is a string
                if (typeof response === 'string') {
                    // Try to parse the string into an array
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                        console.error("Error parsing response string:", e);
                    }
                }

                // Check if the response is an array
                if (Array.isArray(response)) {
                    console.log("Response is an array. Number of weeks:", response.length);
                    $.each(response, function (index, week) {
                        weekDropdown.append($("<option>").val(week).text(week));
                    });
                } else {
                    console.error("Invalid response format for weeks");
                    console.log("Response Content:", response);
                }

                // Trigger the change event for the Week dropdown to fetch panel data initially
                weekDropdown.trigger('change');
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        });
    });

    // Event listener for the Week dropdown
    $('#selectedWeek').on('change', function () {
        var selectedBazarId = $('#bazarid').val();
        var selectedWeek = $(this).val();

        // Fetch and display panel data based on selected Bazaar and Week
        $.ajax({
            type: "GET",
            url: "./assets/php/fetch-panel-data.php",
            data: { bazarid: selectedBazarId, weekValue: selectedWeek },
            success: function (panelData) {
                // Update your form elements with the fetched data
                // For example, you can update Monday open, jodi, close values
                $('#monday_open').val(panelData.monday_open);
                $('#monday_jodi').val(panelData.monday_jodi);
                $('#monday_close').val(panelData.monday_close);
                
                // Update Tuesday open, jodi, close values
                $('#tuesday_open').val(panelData.tuesday_open);
                $('#tuesday_jodi').val(panelData.tuesday_jodi);
                $('#tuesday_close').val(panelData.tuesday_close);

                // Update Wednesday open, jodi, close values
                $('#wednesday_open').val(panelData.wednesday_open);
                $('#wednesday_jodi').val(panelData.wednesday_jodi);
                $('#wednesday_close').val(panelData.wednesday_close);

                // Update Thursday open, jodi, close values
                $('#thursday_open').val(panelData.thursday_open);
                $('#thursday_jodi').val(panelData.thursday_jodi);
                $('#thursday_close').val(panelData.thursday_close);

                // Update Friday open, jodi, close values
                $('#friday_open').val(panelData.friday_open);
                $('#friday_jodi').val(panelData.friday_jodi);
                $('#friday_close').val(panelData.friday_close);

                // Update Saturday open, jodi, close values
                $('#saturday_open').val(panelData.saturday_open);
                $('#saturday_jodi').val(panelData.saturday_jodi);
                $('#saturday_close').val(panelData.saturday_close);

                // Update Sunday open, jodi, close values
                $('#sunday_open').val(panelData.sunday_open);
                $('#sunday_jodi').val(panelData.sunday_jodi);
                $('#sunday_close').val(panelData.sunday_close);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        });
    });
});



    </script>

<script type="text/javascript">
    function toggleLeftSideMenu() {
var leftSideMenu = document.querySelector('.left-side-menu');
if (leftSideMenu.style.display === 'none' || leftSideMenu.style.display === '') {
leftSideMenu.style.display = 'block';
} else {
leftSideMenu.style.display = 'none';
}
}
$(document).ready(function() {
$('#toggleButton').click(function() {
$('.left-side-menu').toggle();
});
});

</script>

</body>

</html>