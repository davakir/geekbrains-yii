<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Маргарита - Фотограф - Товары';
$this->registerCssFile('/main/css/products.css');
?>
<section id="products">
	<h2>Товары</h2>
	<?=ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => '_productItem'
	])?>
</section>
