<?php

namespace app\models\events;

use yii\base\Event;

class UserEvent extends Event
{
	public $userId;
}