<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $producers array */
/* @var $image \app\models\ImageUpload */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	    'producers' => $producers,
	    'image' => $image
    ]) ?>

</div>
