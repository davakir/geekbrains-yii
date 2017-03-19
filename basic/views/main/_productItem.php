<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $model \app\models\Products */
?>
<div class="product-item">
	<div class="icon">
		<img src="<?= $model->img_url ?>" alt="">
	</div>
	<div class="info">
		<div class="name">
			<h4><a href="/products/<?=$model->id?>/view"><?= Html::encode($model->name) ?></a></h4>
		</div>
		<div class="description">
			<?= HtmlPurifier::process($model->description) ?>
			<div>Цена: <?=$model->price?> руб.</div>
		</div>
	</div>
</div>