<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <link rel="icon" 
      type="image/png" 
      href="/wp-content/themes/amfence/palmshield-logo-favicon.png"> -->
<?php
//run functions.php scripts

wp_head();
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36827013-18"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-36827013-18');
</script>

<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
<link href="https://fonts.googleapis.com/css?family=Catamaran:200,400,600,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oxanium:600&display=swap" rel="stylesheet">


</head>
<body <?php body_class('v5'); ?>>
	<header>
        <div class="container">
            <div class="row">
                <div class="col-auto logo-container">
                    <a href="/">
                        <div class="header-logo">
                            <?php
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            } ?>
                        </div>
                    </a>
                </div>				<div class="col hidden-fixed">
					<div class="ccc-container">
						<div class="btn-container">
							<h2>CUSTOMER CARE CENTER</h2>
							<div class="menu-customer-care-center-container">
							<ul id="menu-customer-care-center" class="ccc-menu">
								<li><a id="header-shop-online" href="https://localstore.omahafencecompany.com/?referrer=omaha-branch" target="_blank"><i class="fab fa-shopify"></i> SHOP ONLINE<br><span>DIY &amp; CONTRACTOR MATERIAL SALES</span></a></li>
								<li><a id="header-free-estimate" href="https://booknow.appointment-plus.com/qjh427k/" target="_blank"><i class="fas fa-file-invoice-dollar"></i> SCHEDULE A FREE ESTIMATE<br><span>INSTALL SALES</span></a></li>
							</ul>
							</div>
						</div>
						<div class="contact-container">
							<ul>
								<li><a id="header-phone" href="tel:4028966722"><div><i class="fas fa-phone-alt"></i> 402-896-6722</div></a></li>
								<li><a id="header-email" href="/contact-us/"><div><i class="fas fa-envelope"></i> Contact Us</div></a></li>
								<li><a id="header-finance" href="/financing/"><div><i class="fas fa-hand-holding-usd"></i> FINANCE</div></a></li>
							</ul>
						</div>
						<div class="col-auto mobile-nav">
							<div class="nav-bar"></div>
							<div class="nav-bar"></div>
							<div class="nav-bar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
    <div id="mobile-header-ctas" class="container">
        <div class="main-ctas">
            <ul id="menu-customer-care-center" class="ccc-menu row">
                <li><a id="mobile-header-shop-online" href="https://localstore.omahafencecompany.com/?referrer=omaha-branch"><i class="fab fa-shopify"></i> Shop Online</a></li>
                <li><a id="mobile-header-free-estimate" href="https://booknow.appointment-plus.com/qjh427k/" target="_blank"><i class="fas fa-file-invoice-dollar"></i> Free Estimate</a></li>
            </ul>
        </div>
        <div class="contact-ctas">
            <ul class="row">
                <li><a id="mobile-header-phone" href="tel:4028966722"><div><i class="fas fa-phone-alt"></i> Call Us</div></a></li>
                <li><a id="mobile-header-email" href="/contact-us/"><div><i class="fas fa-envelope"></i> Contact Us</div></a></li>
                <li><a id="mobile-header-finance" href="/financing/"><div><i class="fas fa-hand-holding-usd"></i> Finance</div></a></li>
            </ul>
        </div>
    </div>
	<div class="fullwidth fixed-nav-scroll">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="desktop-nav">
						<div class="row">
							<div class="col">
								<nav id="main-nav" class="mega-menu">
									<?php wp_nav_menu( array( 'menu' => 'main-nav', 'depth' => 2) ); ?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<div id="main-content">

