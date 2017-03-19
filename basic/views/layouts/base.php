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
	<?php $this->registerCssFile('base/site.css') ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Cool Ltd',
        'brandUrl' => '/base/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $menuItems = [
	    ['label' => 'Главная', 'url' => ['/base/index']],
	    ['label' => 'О нас', 'url' => ['/base/about']],
	    ['label' => 'Статьи', 'url' => ['/base/articles']],
	    ['label' => 'Контакты', 'url' => ['/base/contact']]
    ];
    
    if (Yii::$app->user->isGuest)
    {
	    $menuItems[] = ['label' => 'Login', 'url' => ['/base/login']];
	    $menuItems[] = ['label' => 'Register', 'url' => ['/base/registration']];
    }
    else
    {
	    $menuItems[] =
		    '<li>'
		    . Html::beginForm(['/basic/logout'], 'post')
		    . Html::submitButton(
			    'Logout (' . Yii::$app->user->identity->login . ')',
			    ['class' => 'btn btn-link logout']
		    )
		    . Html::endForm()
		    . '</li>';
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
        <p class="pull-left">&copy; Cool Ltd <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
