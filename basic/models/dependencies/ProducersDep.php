<?php

namespace app\models\dependencies;

use yii\caching\DbDependency;

class ProducersDep
{
	/**
	 * Получить зависимость списка производителей для кэширования.
	 * Зависимость от изменения количества производителей в БД.
	 *
	 * @return DbDependency
	 */
	public static function getDependency()
	{
		$dep = new DbDependency();
		$dep->sql = 'SELECT COUNT(*) FROM producers';
		
		return $dep;
	}
}