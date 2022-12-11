
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
	<link rel="stylesheet" href="css/pages.css">
	<link rel="stylesheet" href="news_detail.html">
</head>

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
										<a  href="#">
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
								<ul class="navbar_menu">
									<li><a href="index.php">home</a></li>
									<li><a href="index.php?art=categories">shop</a></li>
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

		<div class="fs_menu_overlay"></div>
		<!-- Hamburger Menu -->

		<div class="container contact_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="index.php?art=new_details"><i class="fa fa-angle-right" aria-hidden="true"></i>News detail</a></li>
						</ul>
					</div>

				</div>
			</div>

			<!-- conteiner -->
			<?php
			$fetch_new = show_news();
			foreach ($fetch_new as $new) { ?>
				<div class="new_detail">

					<img src="../uploaded_img/<?= $new['img'] ?>" alt="">
					<h2 style="float:right; width: 600px;"><?= $new['title'] ?></h2>
					<br><br>
					<p>
						<?= $new['content'] ?>
					</p>


				</div>
			<?php

			}
			?>
			<!-- <div class="new_detail">
				
				<img src="images/blog_1.jpg" alt="">
				<h2 style="float:right; width: 600px;">Elon Musk : Testla worker admitted to sabotage</h2>
				<br><br>
				<p >
					Dòng phim lịch sử Việt Nam vẫn được xem là khá mới mẻ đối với giới trẻ. Tuy nhiên, khi đã xem, khán
					giả chắc chắn bồi hồi xúc động khi nhìn lại chặng đường lịch sử hào hùng của dân tộc.
					Phim sử thi Huyền Sử Vua Đinh là một góc nhìn mới mô tả quá trình Đinh Bộ Lĩnh dẹp loạn 12 sứ quân
					thống nhất đất nước
					Bộ phim mở đầu bằng việc Đinh Bộ Lĩnh dập tắt nội loạn ổn định gia tộc. Tiếp theo là quá trình vua
					Đinh từng bước lần lượt kết minh, chiêu hàng hoặc tiêu diệt các sứ quân khác. Xuyên suốt phim là
					những màn đấu trí, đấu dũng, đấu mưu gay cấn, những màn ám sát, phục kích đầy bất ngờ sẽ mô tả được
					hết sự khó khăn của Đinh Bộ Lĩnh trong quá trình dẹp loạn 12 sứ quân từ đó khắc họa một vua Đinh đầy
					tài năng và mưu lược.
					Xen lẫn trong đó là tình mẫu tử thiêng liêng, một chút huyền huyễn sẽ tạo thêm những hấp dẫn cho bộ
					phim.
				</p>


			</div> -->

			<!-- Contact Us -->

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
							<div class="cr">©2018 All Rights Reserverd. Template by <a href="#">Colorlib</a> &amp;
								distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
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