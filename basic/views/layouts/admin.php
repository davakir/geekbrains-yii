<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
	<?php
	NavBar::begin([
		'brandLabel' => 'MargoPortfolio Admin',
		'brandUrl' => '/admin',
		'options' => [
			'class' => 'navbar-inverse navbar-fixed-top',
		],
	]);
	echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => [
			['label' => 'Articles', 'url' => ['/admin/articles/']],
			['label' => 'Albums', 'url' => ['/admin/albums/']],
			['label' => 'Photos', 'url' => ['/admin/photos/']],
			['label' => 'Users', 'url' => ['/admin/users/']],
			['label' => 'Roles', 'url' => ['/admin/roles/']],
			['label' => 'Products', 'url' => ['/admin/products/']],
			['label' => 'Producers', 'url' => ['/admin/producers/']]
		],
	]);
	NavBar::end();
	?>
	
	<div class="container">
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<?= $content ?>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; My Company <?= date('Y') ?></p>
		
		<p class="pull-right"><?= Yii::powered() ?></p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
