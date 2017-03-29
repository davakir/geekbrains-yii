<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dependency \yii\caching\DbDependency */

$this->title = 'Маргарита - Фотограф - Товары';
$this->registerCssFile('/main/css/products.css');
?>
<section id="products">
	<h2>Товары</h2>
	<?php if ($this->beginCache('products', [
		'duration' => 60 * 2,
		'dependency' => $dependency
	])) {
		echo ListView::widget([
			'dataProvider' => $dataProvider,
			'itemView' => '_productItem'
		]);
		$this->endCache();
	} ?>
</section>
