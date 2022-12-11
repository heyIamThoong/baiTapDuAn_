<!DOCTYPE html>
<html lang="en">

<head>
  <title>Free Shops</title>
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
</head>
<style>
  * {
    box-sizing: border-box
  }

  /* Full-width input fields */
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus,
  input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  /* Set a style for all buttons */
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  button:hover {
    opacity: 1;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
  }

  /* Float cancel and signup buttons and add an equal width */
  .cancelbtn,
  .signupbtn {
    float: left;
    width: 50%;
  }

  /* Add padding to container elements */
  .container {
    padding: 16px;
  }

  /* Clear floats */
  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Change styles for cancel button and signup button on extra small screens */
  @media screen and (max-width: 300px) {

    .cancelbtn,
    .signupbtn {
      width: 100%;
    }
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
              <div style="position: relative; bottom: 13px;" class="top_nav_left">
                FREE SHIPPING ON ALL ORDERS</div>
            </div>
            <div class="col-md-6 text-right">
              <div class="top_nav_right">
                <ul class="top_nav_menu">

                  <!-- Currency / Language / My Account -->
                  <li class="account">
                    <a style="position: relative; bottom: 13px;" href="#">
                      My Account
                      <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="account_selection">
                      <li><a href="index.php?art=signin"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a>
                      </li>
                      <li><a href="index.php?art=login"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                      <li><a href="index.php?art=quenmk"><i class="fa fa-user-plus" aria-hidden="true"></i>Forgot password</a></li>
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
											<!-- <span id="checkout_items" class="checkout_items">2</span> -->
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

    <!-- form -->
    <br><br><br><br><br><br><b><b><br><br>

      </b></b>
    <div class="form">
      <form action="index.php?art=login" style="border:1px solid #ccc" method="post">
        <div class="container">
       
          <h1> REGISTER </h1>
          <p style="color:green"><?= (isset($thongbao))? $thongbao : '' ?></p>
        
          <hr> <label ><b>User</b></label> <input type="text" placeholder="Enter User" name="user" >
          <p style="color:red;"><?= (isset($error['user']))? $error['user'] : ''; ?></p>
          <label ><b>Pass</b></label> <input type="password" placeholder="Enter pass" name="pass"  >
          <p style="color:red;"><?= (isset($error['pass']))? $error['pass'] : ''; ?></p>
          <label ><b>Address</b></label> <input type="text" placeholder="Enter address" name="address"  >
          <p style="color:red;"><?= (isset($error['address']))? $error['address'] : ''; ?></p>
          <label ><b>Email</b></label> <input type="text" placeholder="Enter email" name="email"  >
          <p style="color:red;"><?= (isset($error['email']))? $error['email'] : ''; ?></p>
          <label ><b>Phone</b></label> <input type="text" placeholder="Enter phone" name="phone"  >
          <p style="color:red;"><?= (isset($error['phone']))? $error['phone'] : ''; ?></p>
          </p>
          <div class="clearfix">
            <a href="index.php?art=signin">You already have the talent , Login ?</a>
            <!-- <button type="button" class="cancelbtn">Cancel</button> --> <button style="text-align : center;"
              type="submit" name="register">REGISTER</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Footer -->

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="logo_container">
          </div>
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
              <div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a>
              </div>
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
  <script src="js/custom.js"></script>

 
</body>

</html>