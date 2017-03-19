<?php

namespace app\modules\admin\controllers;


use app\models\RegistrationForm;
use Yii;
use yii\web\Controller;

class RegisterController extends Controller
{
	/**
	 * Registration action
	 */
	public function actionIndex()
	{
		$model = new RegistrationForm();
		
		if ($model->load(Yii::$app->request->post()) && $model->validate()) :
			if ($user = $model->registration()) :
				if (Yii::$app->getUser()->login($user)) :
					return $this->goHome();
				endif;
			else :
				Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
				Yii::error('Ошибка при регистрации');
				return $this->goBack();
			endif;
		endif;
		
		return $this->render('index', [
			'model' => $model,
		]);
	}
}