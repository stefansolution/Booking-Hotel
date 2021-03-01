<?php
include "connection.php";
include "check.php";
?>
    <!--<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">-->
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">

        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="home.php">
                        <img src="assets/admin_logo.png" alt="logo" class="logo-default" height="50" width="170" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="assets/admin.ico" />
                                <span class="username username-hide-on-mobile"> Admin </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="profile.php">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li>
                                <!--<li>
                                    <a href="">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>-->
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->