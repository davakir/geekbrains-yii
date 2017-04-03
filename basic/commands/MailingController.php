<?php

namespace app\commands;


use app\commands\QueueJobs\MailingJob;
use yii\console\Controller;

/**
 * Работа с почтовой рассылкой.
 *
 * Class MailingController
 * @package app\commands
 */
class MailingController extends Controller
{
	/**
	 * Команда рассылки уведомлений пользователям из списка почтовой рассылки.
	 */
	public function actionSend()
	{
		var_dump(\Yii::$app->queue); die;
		\Yii::$app->queue->push(
			new MailingJob(
				['mailingSubject' => 'sale3for1']
			)
		);
	}
}