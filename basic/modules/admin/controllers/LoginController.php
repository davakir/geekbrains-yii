<?php

namespace app\modules\admin\controllers;


use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
	/**
	 * Login action.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		return $this->render('index', [
			'model' => $model,
		]);
	}
}