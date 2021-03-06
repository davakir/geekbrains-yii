<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ya_photo_id')->textInput() ?>

    <?= $form->field($model, 'album_id')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'access')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_href')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_album')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'hide_original')->checkbox() ?>
	
    <?= $form->field($model, 'visible')->checkbox() ?>
	
	<?= $form->field($model, 'date_created')->widget(\yii\jui\DatePicker::classname(), [
			'language' => 'ru',
			'dateFormat' => 'yyyy-MM-dd',
	]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
