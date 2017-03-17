<?php

namespace app\models;

use Yii;
use yii\base\Object;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * Используется для авторизации.
 *
 * Class User
 * @package app\models
 */
class User extends Object implements IdentityInterface
{
	public $id;
	public $login;
	public $password;
	public $email;
	public $role_id;
	public $is_admin;
	public $is_default;
	public $auth_key;
	public $access_token;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
	    $user = Users::findOne(['id' => $id]);
	
	    return empty($user) ? null : new static($user->toArray());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
	    $user = Users::findOne(['access_token' => $token]);
	
	    return empty($user) ? null : new static($user->toArray());
    }

    /**
     * Finds user by username
     *
     * @param string $login
     * @return User|null
     */
    public static function findByUsername($login)
    {
    	$user = Users::findOne(['login' => $login]);
    	
    	return empty($user) ? null : new static($user->toArray());
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
	
	public static function generatePasswordHash($password)
	{
		return Yii::$app->security->generatePasswordHash($password);
	}
	
	public static function generateAuthKey()
	{
		return Yii::$app->security->generateRandomString();
	}
	
	public function behaviors()
	{
		return [
			TimestampBehavior::className()
		];
	}
}
