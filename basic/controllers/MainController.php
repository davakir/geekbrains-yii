<?php

namespace app\controllers;


use app\models\dependencies\ProductsDep;
use app\models\Products;
use app\models\ProductsSearch;
use Yii;
use yii\filters\PageCache;
use yii\web\Controller;

class MainController extends Controller
{
	public $layout = 'main';
	
	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			]
		];
	}
	
	public function behaviors()
	{
		return [
			[
				'class' => PageCache::className(),
				'duration' => 3600 * 24 * 30,
				'variations' => \Yii::$app->language,
				'only' => ['contacts']
			]
		];
	}
	
	/**
	 * @return string
	 */
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	/**
	 * @return string
	 */
	public function actionProducts()
	{
		$searchModel = new ProductsSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('products', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'dependency' => ProductsDep::getProductsDep()
		]);
	}
	
	/**
	 * @param $id
	 * @return string
	 */
	public function actionView($id)
	{
		$product = Products::findOne($id);
		
		return $this->render('product', [
			'product' => $product
		]);
	}
	
	/**
	 * @return string
	 */
	public function actionContacts()
	{
		return $this->render('contacts');
	}
}