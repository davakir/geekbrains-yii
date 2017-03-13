<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $login
 * @property string $password
 * @property string $lastname
 * @property string $firstname
 * @property string $midname
 * @property integer $is_admin
 * @property integer $is_default
 */
class Users extends \yii\db\ActiveRecord
{
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
            [['login', 'password'], 'required'],
            [['is_admin', 'is_default'], 'integer'],
            [['login', 'password', 'lastname', 'firstname', 'midname'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'login' => 'Login',
            'password' => 'Password',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'midname' => 'Midname',
            'is_admin' => 'Is Admin',
            'is_default' => 'Is Default',
        ];
    }
}
