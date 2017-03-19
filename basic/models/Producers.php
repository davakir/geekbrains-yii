<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producers".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Products[] $products
 */
class Producers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['producer_id' => 'id']);
    }
}
