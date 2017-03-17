<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Albums', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ya_album_id',
            'author',
            'title',
            'summary',
            // 'img_href',
            // 'link_self',
            // 'link_edit',
            // 'link_photos',
            // 'link_cover',
            // 'link_ymapsml',
            // 'link_alternate',
            // 'date_edited',
            // 'date_updated',
            // 'date_published',
            // 'image_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
