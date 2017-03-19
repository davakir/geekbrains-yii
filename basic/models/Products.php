<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $img_url
 * @property integer $price
 * @property string $description
 * @property integer $producer_id
 * @property string $name
 *
 * @property Producers $producer
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img_url', 'price', 'producer_id'], 'required'],
            [['price', 'producer_id'], 'integer'],
            [['description'], 'string'],
            [['img_url'], 'string', 'max' => 3000],
            [['name'], 'string', 'max' => 255],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producers::className(), 'targetAttribute' => ['producer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'img_url' => 'Ссылка на изображение',
            'price' => 'Цена',
	        'name' => 'Наименование',
            'description' => 'Описание товара',
            'producer_id' => 'Производитель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producers::className(), ['id' => 'producer_id']);
    }
}
