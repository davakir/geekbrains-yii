<?php

namespace app\models\dependencies;


use yii\caching\DbDependency;

class ProductsDep
{
	/**
	 * Получить зависимость списка товаров для кэширования.
	 * Зависимость от изменения количества товаров в БД.
	 *
	 * @return DbDependency
	 */
	public static function getProductsDep()
	{
		$dep = new DbDependency();
		$dep->sql = 'SELECT COUNT(*) FROM products';
		
		return $dep;
	}
}