<?php
 if (isset($_SESSION['user'])) {
	extract($_SESSION['user']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
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
	<!-- <link rel="stylesheet" href="css/pages.css"> -->
    <link rel="stylesheet" href="css/carrt.css">
    <!-- <link rel="stylesheet" href="css/chechout.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/all.min.css">
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
                                    }else if($_SESSION['user'] == ''){
										header('location:index.php?art=signin');
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

		<div class="container contact_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="index.php?art=cart"><i class="fa fa-angle-right"
										aria-hidden="true"></i>Cart</a></li>
						</ul>
					</div>

				</div>
			</div>

			<!-- conteiner -->
        <h1>CART</h1>
		<br>
		<br>
        <table >
            <tr class="title">
                <td> Images</td>
                <td>Name</td>
			
                <td>Price</td>
                <td>Quantity</td>
				<td>Sub total</td>
                <td>Manage</td>
            </tr>
			
            <?php
				 if (isset($_SESSION['user'])) {
					extract($_SESSION['user']);
				}
				$grand_total = 0 ;
				$fetch_cart = loadAll_cart_where_user_id($id_kh);
				foreach($fetch_cart as $cart){
					?>
					<tr>
						<form action="" method="post">

							<input type="hidden" name="cart_id" value="<?= $cart['id'] ?>">
							<td>
								<img width="100px" src="../uploaded_img/<?= $cart['image'] ?>" alt="">
							</td>
							<td><?= $cart['name'] ?></td>
							
							<td>$<?= $cart['price'] ?></td>
							<td class="td_button">
								<input type="number" value="<?= $cart['quantity'] ?>" name="quantity" min="1">
								<button type="submit"  name="update_quantity"> <i class="fa fa-wrench" aria-hidden="true" ></i></button>
							
							</td>
							<td>$<?= $sub_total = ($cart['price'] * $cart['quantity']) ?></td>
							<td>
								<a href="index.php?art=cart&delete=<?= $cart['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ? ')" class="a_i"><i class="fa fa-times" aria-hidden="true"></i></i></a>
							</td>
						</form>
					</tr>

				<?php
				$grand_total += $sub_total;
				 }
				?>
           
		   </tbody>
            <tr>
				<td></td>
			</tr>
            <tr>
                <td colspan="5">
					<br><br>
					<span class="total">Total money </span>: <span class="total"><?php echo "$"."$grand_total" ?>
				</span></td>
            </tr>
        </table>
		<br>
		<br>
      <button class="button_a">
	  <a href="index.php?art=checkout" class="<?= ($grand_total > 1)?'':'disabled'; ?>"> 
	   Proceed to checkout
		</a>
	  </button >
		<button class="button_a">
		<a href="index.php?art=categories" class="btn_a">Continue Shopping</a>
		</button>
      <button class="button_a">
	  <a href="index.php?art=cart&delete_all" class="btn_a <?= ($grand_total > 1)? '' : 'disabled' ?>" onclick="return confirm('delete all from cart?');">DELETE ALL</a>
	  </button>


			<!-- Contact Us -->

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
						<form action="post">
							<div
								class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
								<input id="newsletter_email" type="email" placeholder="Your email" required="required"
									data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
									value="Submit">subscribe</button>
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
								distributed by</div>
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
<style>
	
	.title td{
		background-color: #fe4c50;
		color : white;
		font-size: 15px;
		height: 50px;
	}
	.td_button button {
		width: 37px;
		height: 29px;
		background-color: #0099FF;
		border: 1px solid white;
		border-radius: 5px;
	}
	.td_button button i {
		color: white;
	}
	.a_i i{
		width: 37px;
		height: 29px;
		line-height: 29px;
		color: white;
		background-color: red;
		border-radius: 5px;
	}
	.total {
		color : red;
		font-size: 20px;
	}
	.button_a {
		width: 250px;
		height: 30px;
		border: 1px solid white;
		background-color: #fe4c50;
	}
	
	.button_a a {
		color : white;
		border: none;
		/* background-color: #fe4c50; */
	}
</style>
</body>

</html>