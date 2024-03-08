<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once './assets/php/auth.php';

// Check if the user is authenticated
checkAuthentication();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Widgets | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Uss" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">


                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
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
                    <h4 class="page-title-main">Widgets</h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- <?php include './assets/components/sidebar.php'; ?> -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <?php
                                include_once './assets/php/db.php';

                                // Check if the user is authenticated
                                if (!isset($_SESSION['user_id'])) {
                                    // Redirect to login page if not authenticated
                                    header('Location: ../../login.html');
                                    exit();
                                }

                                // Fetch the user's role from the session
                                $userRole = $_SESSION['user_role'];

                                // Fetch the logged-in user's access to bazaars
                                $query = "SELECT b.id, b.bazaar_name, b.bazaar_opentime, b.bazaar_closetime, b.bazaar_result
FROM bazaar b
JOIN users u ON u.user_id = b.bazaar_access_to_users
WHERE u.user_id = ?";

                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('i', $_SESSION['user_id']);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Display bazaar information
                                
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        // Display bazaar information
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h1 class="fw-normal text-dark">
                                                <b>
                                                <?php echo $row['bazaar_name']; ?>
                                                </b>
                                            </h1>
                                            <h5>Bazaar Name</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $open_time = date("g:i A", strtotime($row["bazaar_opentime"]));
                            $close_time = date("g:i A", strtotime($row["bazaar_closetime"])); 
                            ?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-success">
                                                <?php echo $open_time; ?>
                                            </h2>
                                            <h5>Open Time</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-danger">
                                                <?php echo $close_time; ?>
                                            </h2>
                                            <h5>Close Time</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-info">
                                                <?php echo $row['bazaar_result']; ?>
                                            </h2>
                                            <h5>Result</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        // Close the database connection
                        $conn->close();
                        ?>
                    </div>

                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; SattaMatka By <a
                                href="">Uss</a>
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

    <!-- Plugins js -->
    <!-- <script src="assets/libs/peity/jquery.peity.min.js"></script> -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/libs/moment/min/moment.min.js"></script>
    <script src="assets/libs/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Chat js -->
    <script src="assets/js/pages/jquery.chat.js"></script>

    <!-- TODO js-->
    <script src="assets/js/pages/jquery.todo.js"></script>

    <!-- Widgets demo js-->
    <script src="assets/js/pages/widgets.init.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

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