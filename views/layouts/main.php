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
	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
</head>
<body>
	
<?php $this->beginBody() ?>
<section id="home" class="about-us">


<!-- main-menu Start -->
<header class="top-area">
	
</header><!-- /.top-area-->


        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
		</section><!--/.service-->


<footer  class="footer-copyright">
			<div class="container">
				<div class="footer-content">
					<div class="row">

						<div class="col-sm-3">
							<div class="single-footer-item">
								<div class="footer-logo">
									<a href="https://www.sqiva.com/">
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
									<p><a href="../views/signup/index.php">Sign Up</a></p>
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

