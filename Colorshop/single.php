<?php include 'add_to_cart.php'  ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Single Product</title>
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
	<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/first.css">
	<link rel="stylesheet" href="css/single.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.min.css">

	
</head>
<style>
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
							<div style="" class="top_nav_left">
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
										<a style="" href="#">
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

		<div class="fs_menu_overlay"></div>



		<div class="container single_product_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="index.php?art=categories"><i class="fa fa-angle-right" aria-hidden="true"></i>Shop</a>
							</li>
							<!-- <li class="active"><a href="index.php?art=single"><i class="fa fa-angle-right" aria-hidden="true"></i>Single
									Product</a></li> -->
						</ul>
					</div>

				</div>
			</div>
			<?php
			$id_sp = $_GET['id_sp'];
			$fetch_product = loadall_sanpham_where_id($id_sp);
			foreach ($fetch_product as $item) {
			?>
				<!-- <script>
	alert
</script> -->
				<form action="" method="post">
					<div class="row">
						<div class="col-lg-7">
							<div class="single_product_pics">
								<div class="row">
									<?php if (isset($_SESSION['user'])) {
										extract($_SESSION['user']);
									}
									?>
									<input type="hidden" name="user_id" value="<?= $id_kh ?>">
									<!-- ------------ -->
									<input type="hidden" name="pid" value="<?= $item['id_sp'] ?> ">
									<input type="hidden" name="name" value="<?= $item['name'] ?>">
									<input type="hidden" name="price" value="<?= $item['price'] ?>">
									<input type="hidden" name="image" value="<?= $item['img'] ?>">
									<!-- ------------- -->
									<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
										<div class="single_product_thumbnails">
											<ul>
												<li><img style="width:136px; height:136px;" src="<?php echo "../uploaded_img/" . $item['img'] ?>" alt="" data-image="<?php echo "../uploaded_img/" . $item['img'] ?>"></li>
												<li class="active"><img style="width:136px; height:136px;" src="<?php echo "../uploaded_img/" . $item['img2'] ?>" alt="" data-image="<?php echo "../uploaded_img/" . $item['img2'] ?>"></li>
												<li><img style="width:136px; height:136px;" src="<?php echo "../uploaded_img/" . $item['img3'] ?>" alt="" data-image="<?php echo "../uploaded_img/" . $item['img3'] ?>"></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-9 image_col order-lg-2 order-1">
										<div class="single_product_image">
											<div class="single_product_image_background" style="background-image:url(<?php echo "../uploaded_img/" . $item['img2'] ?>)"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="product_details">
								<div class="product_details_title">
									<h2><?php echo $item['name'] ?></h2>
									<p><?php echo $item['mo_ta'] ?></p>
								</div>
								<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
									<span class="ti-truck"></span><span>free shipping</span>
								</div>
								<div class="original_price"></div>
								<div class="product_price">$<?php echo $item['price'] ?></div>
								<br>
								<br>
								
								<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
									<span>Quantity: &ensp;</span>
									<!-- <div class="quantity_selector">
									<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
									<span id="quantity_value">1</span>
									<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
								</div> -->
									<input type="number" name="quantity" style="width :50px;padding-left:5px;" value="1" min="1">
									<!-- <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div> -->
									<input type="submit"  value="Thêm vào giỏ hàng" class="red_button add_to_cart_button" name="add_to_cart" id="add_to_cart" style="border:none;color:white;">
									<!-- <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div> -->
								</div>
							</div>
						</div>
					</div>
				</form>
			<?php } ?>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script>
				$(document).ready(function() {
					$("#binhluan").load("../colorShop/form_binhluan.php", {
						idsp: <?= $id_sp ?>
					});
				});
			</script>
			<div class="comment" id="binhluan">

			</div>


		</div>

		<!-- Best Sellers -->

		<!-- sanphamcungloai -->
		<div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
					<br><br>
                    <div class="section_title new_arrivals_title">
                        <h2>Sản phẩm cùng loại</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
						<?php foreach ($list_sp_cungloai as $key => $row) {
						?>
						
							<div class="product-item ">
								<div class="product discount product_filter">
									<a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>">
										<div class="product_image">
										<img class="img" src="<?php echo "../uploaded_img/".$row['img']  ?>" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['name'] ?></a></h6>
											<h6 class="product_pri"><a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>">$<?php echo $row['price'] ?></a></h6>
										</div>
									</a>
								</div>
								<div style="margin-left :60px;" class="red_button add_to_cart_button"><a href="index.php?art=single&id_sp=<?php echo $row['id_sp'] ?>">Xem chi tiết</a></div>
							</div>
						<?php
							} 
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<style>
		
		.footer {
        	background-color: white;
    	}
		.product-item {
			/* width: 280px; */
			margin-left:5px ;
			margin-bottom: 20px;

		}
		.product-grid {
			margin-top : 50px;
			display: grid;
			grid-template-columns: repeat(auto-fit,minmax(5rem , 1fr));
			gap: 1.5rem;
		}
		.img {
			width: 280px;
			height: 200px;
		}
		.product_name a{
			color: black;
			
		}
		.product_name {
			margin-top : 15px;
			text-align : center;
		}
		.product_pri a {
			text-align : center; 
			color : red ;
		}
		.product_pri {
			margin-top : 15px;
			text-align : center;
		}
		.product_name a:hover {
			opacity: 0.5;
		
		}
	</style>

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
								<li><a href="https://www.facebook.com/thoongne.210703"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
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
							<div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp;
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
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/single_custom.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>

 <!-- <script>
window.location.href('index.php?art=single');
</script> -->


</body>

</html>