<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Ошибка';
?>
<section>
	<div class="site-error">
		
		<h1><?= Html::encode($name) ?></h1>
		
		<div class="alert alert-danger">
			<?= nl2br(Html::encode($message)) ?>
		</div>
		
		<p>
			Произошла ошибка при обработке вашего запроса.
		</p>
		<p>
			Пожалуйста, свяжитесь с нами, если это ошибка сервера. Спасибо.
		</p>
	
	</div>
</section>
