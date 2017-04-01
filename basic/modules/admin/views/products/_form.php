<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
/* @var $producers array */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
	    'id' => 'productsForm',
	    'options' => [
		    'enctype' => 'multipart/form-data'
	    ]
    ]); ?>

    <?= $form->field($model, 'price')->textInput() ?>
	
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'producer_id')->dropDownList($producers) ?>
	
	<?=  $form->field($model, 'img_url')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
