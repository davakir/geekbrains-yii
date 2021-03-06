<?php

namespace app\models;

use app\models\events\UserEvent;
use yii\base\Event;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property integer $role_id
 * @property boolean $is_admin
 * @property boolean $is_default
 * @property string $auth_key
 * @property string $access_token
 * @property bool $in_mailing_list
 *
 * @property Articles[] $articles
 * @property Roles $role
 */
class Users extends ActiveRecord
{
	const CREATE_USER = 'create_user';
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'role_id'], 'required'],
            [['role_id'], 'integer'],
            [['is_admin', 'is_default'], 'boolean'],
            [['login', 'password'], 'string', 'max' => 64],
            [['email', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'role_id' => 'Role ID',
            'is_admin' => 'Is Admin',
            'is_default' => 'Is Default',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
	        'in_mailing_list' => 'In mailing list'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['author' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }
	
	/**
	 * Сохраняем пользователя в базу.
	 *
	 * @param bool $runValidation
	 * @param null $attributeNames
	 * @return bool
	 */
    public function save($runValidation = true, $attributeNames = null)
    {
	    $result = parent::save($runValidation, $attributeNames);
	    $event = new UserEvent();
	    $event->userId = $this->id;
	    $this->trigger(self::CREATE_USER, $event);
	    
	    return $result;
    }
}
