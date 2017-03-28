<?php

use mirocow\yandexmaps\Map as YandexMap;
use mirocow\yandexmaps\Canvas as YandexCanvas;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Маргарита - Фотограф - Контакты';

$this->registerJsFile('/main/js/formHandlers.js');
$this->registerCssFile('/main/css/contacts.css');

$map = new YandexMap('yandex_map', [
	'center' => [55.7372, 37.6066],
	'zoom' => 10,
	/* Enable zoom with mouse scroll */
	'behaviors' => ['default', 'scrollZoom'],
	'type' => "yandex#map",
],
	[
		'controls' => [
			"new ymaps.control.SmallZoomControl()",
			"new ymaps.control.TypeSelector(['yandex#map', 'yandex#satellite'])",
		],
	]
);
?>
<section class="contacts">
	<div class="left-side">
		<div class="title">
			<h1>Контактная информация</h1>
		</div>
		<p>Для уточнения деталей Вы можете связаться со мной одним из следующих способов:</p>
		<div>
			<span class="fa fa-envelope-open"></span>&nbsp;&nbsp;<u>e-mail:</u>
			<samp>opportunities013@mail.ru</samp></div>
		<div>
			<span class="fa fa-phone"></span>&nbsp;&nbsp;<u>Телефон:</u>
			<samp>+7(964)599-42-21</samp>​
		</div>
	</div>
	<div class="right-side">
		<div class="title">
			<h1>Обратная связь</h1>
		</div>
		
		<div id="form-success" style="color: green;">Спасибо! Ваш вопрос отправлен мне!</div>
		<div id="form-fail" style="color: red;">Извините, произошла техническая ошибка, попробуйте еще раз.</div>
		
		<form action="/feedback/send" id="feedback" method="POST">
			<table class="feedback-form">
				<tr class="labels"><label for="name">Имя:</label></tr>
				<tr class="fields">
					<input type="text" id="name" name="name" placeholder="Ваше Имя"/>
				</tr>
				<tr class="labels"><label for="phone">Контактный телефон:</label></tr>
				<tr class="fields">
					<input type="tel" id="phone" name="phone"
					       pattern="\+[7] [(]\d{3}[)] \d{3}-\d{2}-\d{2}"
					       placeholder="+7 (495) 123-45-67"/>
				</tr>
				<tr class="labels"><label for="email">E-mail:</label></tr>
				<tr class="fields">
					<input type="email" id="email" name="email" placeholder="example@gmail.com">
				</tr>
				<tr class="labels"><label for="message">Ваши комментарии:</label></tr>
				<tr class="fields">
					<textarea id="message" name="message" placeholder="Оставьте свое сообщение здесь..."></textarea>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Отправить"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</section>
<div class="clearfix"></div>

<?= YandexCanvas::widget([
	'htmlOptions' => [
		'style' => 'height: 400px;',
	],
	'map' => $map,
]) ?>