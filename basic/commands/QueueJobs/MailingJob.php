<?php

namespace app\commands\QueueJobs;


use app\models\MailingList;
use app\models\Users;
use yii\base\Object;
use zhuravljov\yii\queue\Job;

/**
 * Class MailingJob
 * @package app\commands\QueueJobs
 */
class MailingJob extends Object implements Job
{
	public $mailingSubject;
	
	private $__currentEmail = 'site@example.com';
	
	/**
	 * Здесь действия, которые будут выполняться с данными, полученными из очереди.
	 * В данном случае мы берем запись из очереди и отправляем рассылку на все адреса,
	 * которые включены в собственно рассылку.
	 */
	public function run()
	{
		$list = MailingList::find()->all();
		
		$messages = [];
		/** @var $item MailingList */
		foreach ($list as $item)
		{
			$user = Users::findOne($item->user_id);
			$messages[] = \Yii::$app->mailer->compose('sale', ['userName' => $user->login])
				->setFrom($this->__currentEmail)
				->setTo($user->email)
				->setSubject(ucfirst($this->mailingSubject))
				->send();
		}
	}
}