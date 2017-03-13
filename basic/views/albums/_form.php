<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="albums-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ya_album_id')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'summary')->textInput() ?>

    <?= $form->field($model, 'img_href')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_self')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_edit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_photos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_cover')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_ymapsml')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_alternate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_edited')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_updated')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_published')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_count')->textInput() ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
