<?php

namespace app\models;


use yii\base\Model;

class RegistrationForm extends Model
{
	public $login;
	public $password;
	public $email;
	
	public function rules()
	{
		return [
			[['login', 'password', 'email'], 'filter', 'filter' => 'trim'],
			[['login', 'password', 'email'], 'required'],
			['login', 'string', 'min' => 4, 'max' => 255],
			['password', 'string', 'min' => 6, 'max' => 20],
			['login', 'unique', 'targetClass' => Users::className(), 'message' => 'This login is already in usage']
		];
	}
	
	public function attributeLabels()
	{
		return [
			'login' => 'Логин',
			'email' => 'E-mail',
			'password' => 'Пароль'
		];
	}
	
	public function registration()
	{
		$user = new Users();
		$user->login = $this->login;
		$user->email = $this->email;
		$user->password = User::generatePasswordHash($this->password);
		$user->auth_key = User::generateAuthKey();
		$user->access_token = User::generateAuthKey();
		$user->role_id = 1;
		$user->is_admin = false;
		$user->is_default = false;
		$user->save();
		
		return $user->save() ? new User($user->toArray()) : null;
	}
}