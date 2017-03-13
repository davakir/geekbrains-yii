<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="albums-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'album_id') ?>

    <?= $form->field($model, 'ya_album_id') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'img_href') ?>

    <?php // echo $form->field($model, 'link_self') ?>

    <?php // echo $form->field($model, 'link_edit') ?>

    <?php // echo $form->field($model, 'link_photos') ?>

    <?php // echo $form->field($model, 'link_cover') ?>

    <?php // echo $form->field($model, 'link_ymapsml') ?>

    <?php // echo $form->field($model, 'link_alternate') ?>

    <?php // echo $form->field($model, 'date_edited') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <?php // echo $form->field($model, 'date_published') ?>

    <?php // echo $form->field($model, 'image_count') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
