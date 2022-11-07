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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162581586-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162581586-1');
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36827013-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-36827013-7');
</script>

<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
<link href="https://fonts.googleapis.com/css?family=Catamaran:200,400,600,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oxanium:600&display=swap" rel="stylesheet">


</head>
<body <?php body_class('v4'); ?>>
	<div class="pre-header">
		<div class="container">
			<div class="row">
				<div class="col" style="text-align:right;">
					<p>Hours</p>
				</div>
				<div class="col-auto">
					<p>Mon - Fri 8am - 4:30pm</p>
				</div>
				<div class="col-auto">
					<p>Sat - Sun: Closed</p>
				</div>
				<div class="col-auto">
					<a href="tel:800-800-8080" class="btn2">CALL US: 800-800-8080</a>		
				</div>
			</div>
		</div>
	</div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-auto logo-container"><a href="/"><div class="header-logo"></div><span class="logo-text"><span class="smaller">of</span> SALINA</span></a></div>
				<div class="col hidden-fixed" style="margin-left:100px;">
					<div class="btn-container">
						
						<div class="header-form">
							<h2>Free Estimate</h2>
							<?php gravity_form(4, false, false, false, '', true, 12); ?>
						</div>
					</div>
					<div class="col-auto mobile-nav">
						<div class="nav-bar"></div>
						<div class="nav-bar"></div>
						<div class="nav-bar"></div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="fullwidth">
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

