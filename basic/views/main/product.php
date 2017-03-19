<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $product \app\models\Products */

$this->title = 'Маргарита - Фотограф - ' . $product->name;
$this->registerCssFile('/main/css/products.css');

$view = new DetailView([
	'model' => $product,
	'options' => [
		'class' => 'table'
	],
	'attributes' => [
		'name',
		'description',
		'price' => [
			'attribute' => 'price',
			'label' => 'Цена',
			'value' => function ($data) {
				return $data->price . ' руб.';
			}
		]
	]
]);
?>
<section id="product">
	<h2><?=$product->name?></h2>
	
	<div class="icon">
		<img src="<?=$product->img_url?>" alt="<?=$product->name?>">
	</div>
	<div class="description">
		<?=$view->run()?>
	</div>
</section>