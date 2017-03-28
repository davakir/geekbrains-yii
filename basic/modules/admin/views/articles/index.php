<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';

/* Ссылки не те, надо доработать */
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<!-- Доработать поиск, нужно, чтобы был в одну строку -->
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id' => [
	            'attribute' => 'id',
	            'label' => '№ п/п'
            ],
            'title' => [
	            'attribute' => 'title',
	            'label' => 'Заголовок'
            ],
            'content' => [
	            'attribute' => 'content',
	            'label' => 'Содержимое',
	            'content' => function ($data) {
    	            return mb_substr($data->content, 0, 255, 'UTF-8') . '...';
	            }
            ],
            'author' => [
	            'attribute' => 'author',
	            'label' => 'Автор'
            ],
            'date_created' => [
	            'attribute' => 'date_created',
	            'label' => 'Дата создания'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
