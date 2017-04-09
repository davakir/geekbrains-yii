<?php

namespace app\commands;


use app\models\Quotes;
use app\models\QuotesHistory;
use yii\console\Controller;
use yii\helpers\Console;
use yii\httpclient\Client as HttpClient;

/**
 *  Импорт данных.
 *
 * Class ImportController
 * @package app\commands
 */
class ImportController extends Controller
{
	private $__xmlPath = 'http://www.cbr.ru/scripts/XML_daily.asp';
	
	/**
	 * Импорт котировок с Яндекса.
	 */
	public function actionQuotes()
	{
		$client = new HttpClient();
		$response = $client->createRequest()
			->setMethod('get')
			->setFormat(HttpClient::FORMAT_XML)
			->setUrl($this->__xmlPath)
			->send();
		
		if ($response->isOk)
		{
			$data = $response->data;
			
			/* @var $quote \SimpleXMLElement */
			foreach ($data['Valute'] as $quote)
			{
				$this->stdout("Сохраняем данные по валютным котировкам...\n");
				$this->__saveQuote($quote);
				$this->stdout("Сохраняем данные в историю валютных котировок...\n\n");
				$this->__saveQuoteHistory($quote);
			}
			$this->stdout("\n\nВсе успешно сохранено за ". microtime() - $beginTime ." сек.!\n\n", Console::FG_GREY, Console::BG_BLACK);
		}
	}
	
	/**
	 * @param $quote \SimpleXMLElement
	 */
	private function __saveQuote($quote)
	{
		$quoteId = $quote->attributes()->ID;
		
		$existingQuote = Quotes::findOne(['id' => $quoteId]);
		
		$quotes = $existingQuote ? $existingQuote : (new Quotes());
		$quotes->id = $quoteId;
		$quotes->num_code = $quote->NumCode;
		$quotes->char_code = $quote->CharCode;
		$quotes->nominal = $quote->Nominal;
		$quotes->name = $quote->Value;
		
		$existingQuote ? $quotes->update() : $quotes->save();
	}
	
	private function __saveQuoteHistory($quote)
	{
		$quotesHistory = new QuotesHistory();
		$quotesHistory->id = $quote['@attributes']['ID'];
		$quotesHistory->num_code = $quote['NumCode'];
		$quotesHistory->char_code = $quote['CharCode'];
		$quotesHistory->nominal = $quote['Nominal'];
		$quotesHistory->name = $quote['Value'];
		$quotesHistory->date = date('Y-m-d H:s:i');
		
		$quotesHistory->save();
	}
}