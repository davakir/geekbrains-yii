<?php

namespace app\models;

use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property UploadedFile $img_url
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
            [['name'], 'string', 'max' => 255],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producers::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['img_url'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'price' => 'Цена',
	        'name' => 'Наименование',
            'description' => 'Описание товара',
            'producer_id' => 'Производитель',
	        'img_url' => 'Загрузите изображение'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producers::className(), ['id' => 'producer_id']);
    }
    
    public function uploadFile()
    {
    	$this->img_url->saveAs('@web/main/img/' . $this->img_url->baseName . '.' . $this->img_url->extension);
    }
}
