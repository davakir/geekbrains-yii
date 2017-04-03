<?php

namespace app\commands;


use app\models\Products;
use yii\console\Controller;
use yii\helpers\BaseConsole;
use yii\helpers\Console;

/**
 * Операции с ценами товаров.
 *
 * Class PriceController
 * @package app\commands
 */
class PriceController extends Controller
{
	/**
	 * @var int $limit Лимит обновляемых записей
	 */
	public $limit;
	
	/**
	 * @var string $file Файл с ценами
	 */
	public $file;
	
	/**
	 * @var string $pricesDirectory Базовый путь до директории с ценами
	 */
	private $__pricesDirectory = __DIR__ . '/prices/';
	
	/**
	 * Обновить цены на все товары. --file=<file>
	 */
	public function actionUpdateFromFile()
	{
		if (empty($this->file))
		{
			$this->stdout("\n\nОшибка! Не задан файл с ценами.\n\n", Console::FG_BLACK, Console::BG_RED);
			exit();
		}
		
		if (!file_exists($this->__pricesDirectory . $this->file . '.json'))
		{
			$this->stdout("\n\nОшибка! Такого файла не существует.\n\n", Console::FG_BLACK, Console::BG_RED);
			exit();
		}
		
		$prices = json_decode(file_get_contents($this->__pricesDirectory . $this->file . '.json'), true);
		
		BaseConsole::startProgress(0, count($prices));
		foreach ($prices as $key => $priceInfo)
		{
			if (empty($this->limit) || $key < $this->limit)
			{
				$this->__updatePrice($priceInfo['id'], $priceInfo['price']);
			}
			
			BaseConsole::updateProgress($key, count($prices));
		}
		BaseConsole::endProgress();
		
		$this->stdout('Цены успешно обновлены' . "\n");
	}
	
	public function options($actionID)
	{
		return ['limit', 'file'];
	}
	
	private function __updatePrice($productId, $price)
	{
		if ($product = Products::findOne($productId))
		{
			$product->price = $price;
			$product->update();
		}
		else
		{
			$this->stdout('Товар с id ' . $productId . ' не найден', Console::BG_RED, Console::FG_BLACK);
		}
	}
}