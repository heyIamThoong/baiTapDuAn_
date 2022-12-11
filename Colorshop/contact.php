<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" href="styles/first.css">
</head>
<style>
					
					.shop .submenu{
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
						height:15px;
						text-align: center;
						text-decoration: none;
						display: block;
						border-bottom: 1px solid #ccc;
						line-height:7px;
						
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
                            <div  class="top_nav_left"> 
                                <?php  
                                    if(isset($_SESSION['user'])){
                                        extract($_SESSION['user']);
                                ?>
                                    <?=$name?>
                                <?php
                                    }else{
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
                                        <a  href="#">
                                            My Account
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            <?php 
                                                if(isset($_SESSION['user'])){
                                                    extract($_SESSION['user']);
                                            ?>
                                                <li><a href="index.php?art=update_user"><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i></i>Update</a></li>
															<li><a href="index.php?art=order_history">Đơn mua</a></li>
                                                <li><a href="index.php?art=logout"><i class="fa fa-user-plus"
                                                            aria-hidden="true" onclick="return confirm('Bạn có muốn đăng xuất không ? ')"></i>Thoát</a></li>
                                            <?php
                                                }else{
                                            ?>
                                                <li><a href="index.php?art=signin"><i class="fa fa-sign-in"
                                                            aria-hidden="true"></i>Sign In</a></li>
                                                <li><a href="index.php?art=login"><i class="fa fa-user-plus"
                                                            aria-hidden="true"></i>Register</a></li>
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
                                        <?php if (isset($_SESSION['user'])) { extract($_SESSION['user']);?>
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

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="#">home</a></li>
				<li class="menu_item"><a href="#">shop</a></li>
				<li class="menu_item"><a href="#">promotion</a></li>
				<li class="menu_item"><a href="#">pages</a></li>
				<li class="menu_item"><a href="#">blog</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>

	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="index.php?art=contact"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Map Container -->

		<div class="row">
			<div class="col">
				<div id="google_map">
					<div class="map_container">
						<iframe style="width:100% ; height :510px ;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8638558814605!2d105.74459841540664!3d21.038132792833082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1667537061813!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>					</div>
				</div>
			</div>
		</div>

		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1>Contact Us</h1>
					<p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
					<div>
						<p>(800) 686-6688</p>
						<p>info.deercreative@gmail.com</p>
					</div>
					<div>
						<p>mm</p>
					</div>
					<div>
						<p>Open hours: 8.00-18.00 Mon-Fri</p>
						<p>Sunday: Closed</p>
					</div>
				</div>

				<!-- Follow Us -->

				<div class="follow_us_contents">
					<h1>Follow Us</h1>
					<ul class="social d-flex flex-row">
						<li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>

			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Get In Touch With Us!</h1>
					<p>Fill out the form below to recieve a free and confidential.</p>
					<form action="index.php?art=contact" method="post" name="frmDangKy" onsubmit=" return validate()">
							<div>
								<?php if (isset($_SESSION['user'])) {
									extract($_SESSION['user']);
								}
								?>


									<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" value="<?php if (isset($name)) {
																																						echo $name;
																																					}  ?>">
									<?php if (isset($error['name'])) { ?>
										<span style="color:red;"><?= $error['name'] ?></span>
									<?php  } ?>
									<input id="input_email" class="form_input input_email input_ph" type="text" name="email" placeholder="Email" value="<?php if (isset($email)) {
																																							echo $email;
																																						}  ?>">
									<?php if (isset($error['email'])) { ?>
										<span style="color:red;"><?= $error['email'] ?></span>
									<?php  } ?>
									<input id="input_content" class="form_input input_websi input_ph" type="text" name="content" placeholder="Description" value="<?php if (isset($content)) {
																																										echo $content;
																																									}  ?>">
									<?php if (isset($error['content'])) { ?>
										<span style="color:red;"><?= $error['content'] ?></span>
									<?php  } ?>
									<input id="input_phone" class="form_input input_websi input_ph" type="text" name="phone" placeholder="Phone" value="<?php if (isset($phone)) {
																																							echo $phone;
																																						}  ?>">
									<?php if (isset($error['phone'])) { ?>
										<span style="color:red;"><?= $error['phone'] ?></span>
									<?php  } ?>
									<input type="hidden" name="user_id" value="<?= $id_kh ?>">

							</div>
						

						<button id="review_submit" type="submit" name="send_messages" class="red_button message_submit_btn trans_300" value="Submit">send message</button>
					</div>
					</form>

				</div>
			</div>										

		</div>
	</div>																																

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">																																 																
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Subscribe to our newsletter and get 20% off your first purchase</p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2018 All Rights Reserverd. Template by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/contact_custom.js"></script>
</body>

</html>
