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
    <title>Dashboard | Sattamatka</title>
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

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-sidebar-user='true'>

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
                        <a href="./logout.php" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="dashboard.php" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="16">
                    </span>
                </a>
                <a href="dashboard.php" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <!-- <li>
                    <button class="button-menu-mobile disable-btn waves-effect" onclick="toggleLeftSideMenu()">
                        <i class="fe-menu"></i>
                    </button>
                </li> -->
                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                        </button>

                    </a>
                </li>

                <li>
                    <h4 class="page-title-main">Dashboard</h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <?php include './assets/components/sidebar.php' ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <h1>Welcome</h1>
                    <div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Total Bazar</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-start" dir="ltr">
                                            <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 " data-bgColor="#F9B9B9" value="58" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                        </div>

                                        <div class="widget-detail-1 text-end">
                                            <h2 class="fw-normal pt-2 mb-1">

                                                <?php
                                                include_once './assets/php/db.php';

                                                $userId = $_SESSION['user_id'];
                                                $query = "SELECT count(*) FROM bazaar WHERE bazaar_access_to_users = ?";

                                                $stmt = $conn->prepare($query);
                                                $stmt->bind_param('i', $userId); // Use $userId directly, no need for $_SESSION['user_id']
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                // Now you can fetch the result as needed
                                                $row = $result->fetch_assoc();
                                                $count = $row['count(*)'];

                                                // Use $count as needed

                                                echo $count;

                                                ?>

                                            </h2>
                                            <p class="text-muted mb-1">Total Bazar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-end">
                                            <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                            <h2 class="fw-normal mb-1"> 8451 </h2>
                                            <p class="text-muted mb-3">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-alt-success progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                                <span class="visually-hidden">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Days Left</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-start" dir="ltr">
                                            <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a" data-bgColor="#FFE6BA" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                        </div>
                                        <div class="widget-detail-1 text-end">

                                            <?php
                                            include_once './assets/php/db.php';

                                            $userId = $_SESSION['user_id'];
                                            $query = "SELECT DATEDIFF(m.end_date, CURDATE()) AS days_left
                                                        FROM membership m
                                                        JOIN users u ON m.user_id = u.user_id
                                                        WHERE m.user_id = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param('i', $userId); // Use $userId directly, no need for $_SESSION['user_id']
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Now you can fetch the result as needed
                                            $row = $result->fetch_assoc();
                                            $days_left = $row['days_left'];

                                            // Apply styling based on the value
                                            if ($days_left < 10) {
                                                echo '<h2 class="fw-normal pt-2 mb-1"> <b style="color: red;">' . $days_left . '</b></h2>';
                                            } else {
                                                echo '<h2 class="fw-normal pt-2 mb-1">' . $days_left . '</h2> ';
                                            }

                                            $stmt->close();
                                            $conn->close();
                                            ?>
                                            
                                            <p class="text-muted mb-1"> <a href="https://wa.link/ir27nr"> Recharge Now </a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-end">
                                            <span class="badge bg-pink rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                            <h2 class="fw-normal mb-1"> 158 </h2>
                                            <p class="text-muted mb-3">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-alt-pink progress-sm">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                                <span class="visually-hidden">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                    </div>

                    <div class="row">
                        <iframe style="height: 350px;" src="https://satkamatkarb.online/user/assets/items/calculator.php" frameborder="0"></iframe>

                    </div>
                </div> <!-- container-fluid -->

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

    <?php include './assets/components/msidebar.php' ?>

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
    <!-- knob plugin -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="assets/libs/morris.js06/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboar init js-->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- <script type="text/javascript">
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
        
    </script> -->
    <script type="text/javascript">
    function toggleLeftSideMenu() {
        var leftSideMenu = document.querySelector('.left-side-menu');
        if (window.innerWidth <= 991.98) {
            if (leftSideMenu.style.display === 'none' || leftSideMenu.style.display === '') {
                leftSideMenu.style.display = 'block';
            } else {
                leftSideMenu.style.display = 'none';
            }
        }
    }

    // Initial setup for larger screens
    window.addEventListener('resize', function () {
        if (window.innerWidth > 991.98) {
            document.querySelector('.left-side-menu').style.display = 'block';
        }
    });

    // Optional: You can also use jQuery for the click event
    $(document).ready(function () {
        $('#toggleButton').click(function () {
            toggleLeftSideMenu();
        });
    });
</script>


</body>

</html>