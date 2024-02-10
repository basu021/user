<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">User Name</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="./logout.php" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">User</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="./logout.php">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="dashboard.php">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">9+</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Bazar</li>

                <li>
                    <a href="#bazar" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-outline"></i>
                        <span> Bazar </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="bazar">
                        <ul class="nav-second-level">
                            <li>
                                <a href="./view-bazar.php">View Bazar</a>
                            </li>
                            <li>
                                <a href="manage-bazar.php">Manage Bazar</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="j.php">
                        <i class="mdi mdi-forum-outline"></i>
                        <span> Jodi </span>
                    </a>
                </li>

                <li>
                    <a href="#panel" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-outline"></i>
                        <span> Panel </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="panel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="./addpanel.php">Add Panel</a>
                            </li>
                            <li>
                                <a href="./managepannel.php">Manage Panel</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="starline.php">
                        <i class="mdi mdi-forum-outline"></i>
                        <span> Star Line </span>
                    </a>
                </li>

                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->