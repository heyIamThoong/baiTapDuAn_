<!DOCTYPE html>
<html lang="en">

<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" href="styles/pages.css">
    <link rel="stylesheet" href="css/chechout.css">
    <link rel="stylesheet" href="css/history_order.css">

    <!-- Google Font -->


    <!-- Css Styles -->
    <link rel="stylesheet" href="css1/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css1/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css1/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css1/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css1/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css1/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css1/style.css" type="text/css">
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;

    }

    .footer {
        background-color: white;
    }

    .shop .submenu {
        transition: 1s;
    }

    ul.root>li {
        list-style: none;
        position: relative;
    }

    ul.root>li>a {
        text-decoration: none;
        color: black;
        transition: 0.3s;
        line-height: 20px;

    }

    ul.root>li>a:hover {
        color: red;
        transition: ease-in 1s;
        -moz-transittion: ease-in 0.35s;
        -webkit-transition: ease-in 0.35s;
    }

    ul.submenu {
        width: 150px;
        background: #fff;
        display: none;
        position: absolute;
    }

    ul.submenu>li {
        height: 40px;
        width: 100%;
        list-style: none;

    }

    ul.submenu>li>a {
        position: relative;
        bottom: 15px;
        height: 15px;
        text-align: center;
        text-decoration: none;
        display: block;
        border-bottom: 1px solid #ccc;
        line-height: 7px;

    }

    ul.root>li:hover ul.submenu {

        display: block;
    }


    .shop .submenu {
        transition: 1s;
    }

    ul.submenu>li>a:hover {
        color: red;
        transition: ease-in 1s;
        -moz-transittion: ease-in 0.35s;
        -webkit-transition: ease-in 0.35s;
    }
</style>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    extract($_SESSION['user']);
                                ?>
                                    <?= $name ?>
                                <?php
                                } else {
                                ?>
                                    FREE SHIPPING ON ALL ORDERS
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- Currency / Language / My Account -->
                                    <li class="account">
                                        <a href="#">
                                            My Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            <?php
                                            if (isset($_SESSION['user'])) {
                                                extract($_SESSION['user']);
                                            ?>
                                                <li><a href="index.php?art=update_user"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i>Update</a></li>
                                                <li><a href="index.php?art=order_history">Đơn mua</a></li>
                                                <li><a href="index.php?art=logout" onclick="return confirm('Bạn có muốn đăng xuất không ? ')"><i class="fa fa-user-plus" aria-hidden="true"></i>Thoát</a></li>
                                            <?php
                                            } else {
                                            ?>
                                                <li><a href="index.php?art=signin"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                                <li><a href="index.php?art=login"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                                <li><a href="index.php?art=quenmk"><i class="fa fa-user-plus" aria-hidden="true"></i>Forgot password</a></li>
                                            <?php
                                            }
                                            ?>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="index.php">Deigo<span>shop</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu root">
                                    <li><a href="index.php">home</a></li>
                                    <li><a href="index.php?art=categories">shop</a>

                                        <ul class="submenu">
                                            <?php
                                            $list_dm = loadall_danhmuc();
                                            foreach ($list_dm as $dm) {
                                            ?>
                                                <li><a href="index.php?art=categories&id=<?php echo $dm['iddm'] ?>"><?php echo $dm['name'] ?></a></li>
                                            <?php } ?>
                                        </ul>

                                    </li>
                                    <li><a href="index.php?art=pages">pages</a></li>
                                    <li><a href="index.php?art=contact">contact</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li class="checkout">
                                        <a href="index.php?art=cart">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <?php if (isset($_SESSION['user'])) {
                                                extract($_SESSION['user']); ?>
                                                <span id="checkout_items" class="checkout_items"><?= $number_cart = number_of_cart($id_kh) ?></span>
                                            <?php } ?>
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>