<!DOCTYPE html>
<html lang="en">
  <head>
    <title>L A U N D R Y I N</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/animate.css">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/aos.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/ionicons.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/style.css">
		  <script src="<?=base_url()?>assets/user/js/jquery.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">L A U N D R Y I N</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
		
		<div class="hero-wrap js-fullheight" style="background-image: url('<?=base_url()?>assets/user/images/23.png');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        	<h3 class="v">L A U N D R Y I N - Solusi Pakaianmu</h3>
        	<h3 class="vr">Since - 2018</h3>
          <div class="col-md-11 ftco-animate text-center">
            <h1>L A U N D R Y I N</h1>
            <h2><span>Membersihkan Pakaianmu</span></h2>
          </div>
          <div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
						</a>
					</div>
        </div>
      </div>
    </div>

    <div class="goto-here"></div>

		<section class="content">
                    <div class="container-fluid">
                    <?php 
                    $this->load->view($konten);
                    ?>
                    </div>
    </section>
    
    

    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Modist</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
								<div class="mapouter">
									<div class="gmap_canvas">
										<iframe width="612" height="513" id="gmap_canvas" src="https://maps.google.com/maps?q=SMK%20Telkom%20Malang&t=&z=15&ie=UTF8&iwloc=&output=embed"
											frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
										<a href="https://www.pureblack.de">webseite kosten</a>
									</div>
									<style>
										.mapouter {
											text-align: right;
											height: 100px;
											width: 100px;
										}

										.gmap_canvas {
											overflow: hidden;
											background: none !important;
											height: 300px;
											width: 300px;
										}
									</style>
								</div>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



  <script src="<?=base_url()?>assets/user/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/popper.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()?>assets/user/js/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/jquery.stellar.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/aos.js"></script>
  <script src="<?=base_url()?>assets/user/js/jquery.animateNumber.min.js"></script>
  <script src="<?=base_url()?>assets/user/js/bootstrap-datepicker.js"></script>
  <script src="<?=base_url()?>assets/user/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=base_url()?>assets/user/js/google-map.js"></script>
  <script src="<?=base_url()?>assets/user/js/main.js"></script>
    
  </body>
</html>