<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<link rel="icon" type="image/x-icon" href="<?= '/main/favicon.ico' ?>"/>
		
		<?php $this->registerCssFile('/main/vendor/font-awesome-4.7.0/css/font-awesome.min.css') ?>
		<?php $this->registerCssFile('/main/css/style.css') ?>
		
		<?php $this->head() ?>
	</head>

	<body>
		<?php $this->beginBody() ?>
		<div class="wrapper">
			<div class="content">
				<nav>
					<div class="home">
						<a href="/">
							<span>Margareth Evstynina</span>
							<span>Photo Portfolio</span>
						</a>
					</div>
					<ul class="menu">
						<li class="menu-item">
							<a href="/gallery">Галерея
								<span class="fa fa-camera-retro"></span>
							</a>
						</li>
						<li class="menu-item">
							<a href="/products">Товары
								<span class="fa fa-cog"></span>
							</a>
						</li>
						<li class="menu-item">
							<a href="/about">Обо мне
								<span class="fa fa-id-card"></span>
							</a>
						</li>
						<li class="menu-item">
							<a href="/service">Услуги
								<span class="fa fa-cog"></span>
							</a>
						</li>
						<li class="menu-item">
							<a href="/contacts">Контакты
								<span class="fa fa-envelope"></span>
							</a>
						</li>
					</ul>
				</nav>
				
				<?= $content ?>
			
			</div>
			<footer>
				<div class="social">
					<a href="https://new.vk.com/club81993158" target="_blank">
						<div class="fa fa-vk fa-2x"></div>
					</a>
					<a href="" target="_blank">
						<div class="fa fa-facebook-official fa-2x"></div>
					</a>
					<a href="https://www.instagram.com/margaritae_e/" target="_blank">
						<div class="fa fa-instagram fa-2x"></div>
					</a>
				</div>
				<div class="copyright"><?= date('Y') ?> &copy; Все права защищены</div>
			</footer>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"
		        crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"
		        crossorigin="anonymous"></script>
		
		<?= $this->endBody() ?>
	</body>
</html>
<?= $this->endPage() ?>
