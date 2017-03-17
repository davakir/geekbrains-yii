<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhotosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ya_photo_id') ?>

    <?= $form->field($model, 'album_id') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'hide_original')->checkbox() ?>

    <?php // echo $form->field($model, 'access') ?>

    <?php // echo $form->field($model, 'img_href') ?>

    <?php // echo $form->field($model, 'link_album') ?>

    <?php // echo $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
