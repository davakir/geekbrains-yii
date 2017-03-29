<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProducersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dependency \yii\caching\DbDependency */

$this->title = 'Producers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Producers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<?php
		if ($this->beginCache('producers', ['duration' => 60, 'dependency' => $dependency]))
		{
			echo GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					
					'id',
					'name',
					
					['class' => 'yii\grid\ActionColumn'],
				],
			]);
			$this->endCache();
		}
	?>
</div>
