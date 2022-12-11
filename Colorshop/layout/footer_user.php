<!-- Footer -->

<footer class="footer">
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
								<button id="newsletter_submit" type="button" class="newsletter_submit_btn trans_300"
									value="Submit">subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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
							<div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o"
									aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a
									href="https://themewagon.com">ThemeWagon</a></div>
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

	<script src="js1/jquery-3.3.1.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/jquery.nice-select.min.js"></script>
    <script src="js1/jquery.nicescroll.min.js"></script>
    <script src="js1/jquery.magnific-popup.min.js"></script>
    <script src="js1/jquery.countdown.min.js"></script>
    <script src="js1/jquery.slicknav.js"></script>
    <script src="js1/mixitup.min.js"></script>
    <script src="js1/owl.carousel.min.js"></script>
    <script src="js1/main.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

   document.querySelectorAll('input[type="number"]').forEach(inputNumbmer => {
      inputNumbmer.oninput = () =>{
         if(inputNumbmer.value.length > inputNumbmer.maxLength) inputNumbmer.value = inputNumbmer.value.slice(0, inputNumbmer.maxLength);
      }
   });

</script>
<?php require 'mail/messages.php' ?>

<!-- <script>
	window.alert("Sản phẩm đã tồn tại !");
</script> -->
</body>

</html>