<!DOCTYPE html>
<html lang="en">

<head>
	<title>Colo Shop Categories</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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
					.search{
						width: 270px;
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
                                                <li><a href="index.php?art=logout" onclick="return confirm('Bạn có muốn đăng xuất không ? ')"><i class="fa fa-user-plus"
                                                            aria-hidden="true"></i>Thoát</a></li>
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


		<div class="container product_section_container">
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="index.php?art=categories"><i class="fa fa-angle-right"
										aria-hidden="true"></i>Shop</a></li>
						</ul>
					</div>

					<!-- Sidebar -->

					<div class="sidebar">

						<!-- Price Range Filtering -->
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Filter by Price</h5>
							</div>
							<p>
								<input type="text" id="amount" readonly
									style="border:0; color:#f6931f; font-weight:bold;">
							</p>
							<div id="slider-range"></div>
							<div class="filter_button"><span>filter</span></div>
						</div>
						

						<!-- Sizes -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Sizes</h5>
							</div>
							<ul class="checkboxes">
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
								<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
							</ul>
						</div> -->

						<!-- Color -->

					</div>

					<!-- Main Content -->

					<div class="main_content">

						<!-- Products -->

						<div class="products_iso">
							<div class="row">

								<div class="col">
									

									<!-- Product Sorting -->

									<div class="product_sorting_container product_sorting_container_top">
										<ul class="product_sorting">
											<li>
												<span class="type_sorting_text">Default Sorting</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_type">
													<li class="type_sorting_btn"
														data-isotope-option='{ "sortBy": "original-order" }'>
														<span>Default Sorting</span>
													</li>
													<li class="type_sorting_btn"
														data-isotope-option='{ "sortBy": "price" }'><span>Price</span>
													</li>
													<li class="type_sorting_btn"
														data-isotope-option='{ "sortBy": "name" }'><span>Product
															Name</span></li>
												</ul>
											</li>

										</ul>
										<ul class="product_sorting">
											<li>
												<span>Show:</span>
												<span class="num_sorting_text">04</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_num">
													<li class="num_sorting_btn"><span>01</span></li>
													<li class="num_sorting_btn"><span>02</span></li>
													<li class="num_sorting_btn"><span>03</span></li>
													<li class="num_sorting_btn"><span>04</span></li>
													<li class="num_sorting_btn"><span>05</span></li>
													<li class="num_sorting_btn"><span>06</span></li>
													<li class="num_sorting_btn"><span>07</span></li>
													<li class="num_sorting_btn"><span>08</span></li>
													<li class="num_sorting_btn"><span>09</span></li>
													<li class="num_sorting_btn"><span>10</span></li>
													<li class="num_sorting_btn"><span>11</span></li>
													<li class="num_sorting_btn"><span>12</span></li>
												</ul>
											</li>
										</ul>
										<ul class="product_sorting">		
											<div class="search">
												<form  method="post">
													<input class="form-control border-1 search" name="search_box" type="text" placeholder="Search"  >
												</form>
											</div>
										</ul>

									</div>

									<!-- Product Grid -->

									<div class="product-grid">

										<!-- Product 1 -->
										<?php foreach ($list_sp as $key => $row) {
										?>
										
											<div class="product-item men">
												<a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>">
													<div class="product discount product_filter">
														<div class="product_image">
															<img src="<?php echo "../uploaded_img/".$row['img'] ?> " alt="">
														</div>
														<div class="favorite favorite_left"></div>
														<div class="product_info">
															<h6 class="product_name"><a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['name'] ?></a></h6>
															<div class="product_price">$<?php echo $row['price'] ?></div>
														</div>
													</div>

												</a>
												<div class="red_button add_to_cart_button"><a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>">Xem chi tiết</a></div>
											</div>
										<?php	} ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>free shipping</h6>
								<p>Suffered Alteration in Some Form</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>cach on delivery</h6>
								<p>The Internet Tend To Repeat</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>45 days return</h6>
								<p>Making it Look Like Readable</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>opening all week</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Newsletter -->

		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div
							class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter and get 20% off your first purchase</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div
							class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required"
								data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
								value="Submit">subscribe</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div
							class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<li><a href="#">Blog</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="contact.html">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div
							class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
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
<!-- <ul style="border:1px solid black ; margin:10px;">
	<li></li>
</ul> -->
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/categories_custom.js"></script>
</body>

</html>