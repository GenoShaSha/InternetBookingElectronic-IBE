<?php


/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);

$this->registerJsFile("@web/js/bootsnav.js");
$this->registerJsFile("@web/js/bootsrap.min.js");
$this->registerJsFile("@web/js/custom.js");
$this->registerJsFile("@web/js/datepicker.js");
$this->registerJsFile("@web/js/jquery-ui.min.js");
$this->registerJsFile("@web/js/jquery.counterup.min.js");
$this->registerJsFile("@web/js/jquery.filterizr.min.js");
$this->registerJsFile("@web/js/jquery.js");
$this->registerJsFile("@web/js/jquery.min.js");
$this->registerJsFile("@web/js/jquery.sticky.js");
$this->registerJsFile("@web/js/owl.carousel.min.js");
$this->registerJsFile("@web/js/waypoint.min.js");

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="no-js">
<head>
    <title>IBE</title>
    <?php $this->head() ?>

    <!-- META DATA -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
		<!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />
	
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
	
		
</head>
<body>
	
<?php $this->beginBody() ?>


			<!-- main-menu Start -->
			<header class="top-area">
			<div class="header-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="logo">
								<a href="index.html">
									<img src = './assets/logo/FullLogo.png' style="width:100%; height:auto; max-width:300px;">
								</a>
							</div><!-- /.logo-->
						</div><!-- /.col-->
						<div class="col-sm-10">
							<div class="main-menu">
							
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<i class="fa fa-bars"></i>
									</button><!-- / button-->
								</div><!-- /.navbar-header-->
								<div class="collapse navbar-collapse">		  
									<ul class="nav navbar-nav navbar-right">
										<li class="smooth-menu"><a href="#home">home</a></li>
										<li class="smooth-menu"><a href="#gallery">My Trips</a></li>
										<li class="smooth-menu"><a href="#gallery">Check-in</a></li>
										<li>
											<label class="dropdown">
												<div class="dd-button">
												  Dropdown
												</div>
											  
												<input type="checkbox" class="dd-input" id="test">
											  
												<ul class="dd-menu">
												  <li class="profile-btn"><a href="./pages/Login.html">Log in</a></li>
												  <li  class="profile-btn"><a href="./pages/Register.html">Register</a></li>
												
												</ul>
												
											  </label>
										</li><!--/.project-btn--> 
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.main-menu-->
						</div><!-- /.col-->
					</div><!-- /.row -->
					<div class="home-border"></div><!-- /.home-border-->
				</div><!-- /.container-->
			</div><!-- /.header-area -->
	
		</header><!-- /.top-area-->


        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>

<footer  class="footer-copyright">
			<div class="container">
				<div class="footer-content">
					<div class="row">

						<div class="col-sm-3">
							<div class="single-footer-item">
								<div class="footer-logo">
									<a href="index.html">
										Sqiva<span></span>
									</a>
									<p>
										implementing quality
									</p>
								</div>
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item">
								<h2>link</h2>
								<div class="single-footer-txt">
									<p><a href="#">home</a></p>
									<p><a href="#">Manage booking</a></p>
									<p><a href="#">Check-in</a></p>
									<p><a href="#">contact</a></p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->

						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item">
								<h2>popular destination</h2>
								<div class="single-footer-txt">
									<p><a href="#">china</a></p>
									<p><a href="#">venezuela</a></p>
									<p><a href="#">brazil</a></p>
									<p><a href="#">australia</a></p>
									<p><a href="#">london</a></p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div>

						<div class="col-sm-3">
							<div class="single-footer-item text-center">
								<h2 class="text-left">contacts</h2>
								<div class="single-footer-txt text-left">
									<p>+92 321 1234 6543</p>
									<p class="foot-email"><a href="#">info@squiva.com</a></p>
									<p>Jakarta, Indonesia</p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

					</div><!--/.row-->

				</div><!--/.footer-content-->
				<hr>
				<div class="foot-icons ">
					<ul class="footer-social-links list-inline list-unstyled">
		                <li><a href="https://id.linkedin.com/company/sqiva" target="_blank" > <img  src="<?= \Yii::getAlias('@web/images/footer/linked.png') ?> "></a></li>
		                <li><a href="#" target="_blank"> <img  src="<?= \Yii::getAlias('@web/images/footer/twitter.png') ?> "></a></li>
		                <li><a href="#" target="_blank" > <img  src="<?= \Yii::getAlias('@web/images/footer/insta.png') ?> "> </a></li>
		        	</ul>
		        	<p>&copy; 2022 <a href="https://www.sqiva.com/">Squiva</a>. All Right Reserved</p>

		        </div><!--/.foot-icons-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->

    

		
		

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

