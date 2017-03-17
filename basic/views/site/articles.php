<?php

use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $articles array */

$this->title = 'Статьи';
?>

<?php /** @var $article \app\models\Articles */ ?>
<?php foreach ($articles as $article) { ?>
	<div class="article">
		<h3><?=$article->id?>.&nbsp;<?=$article->title?></h3>
		<div><?=mb_substr($article->content, 0, 255, 'UTF-8')?>&hellip;</div>
	</div>
	<hr>
<?php } ?>
