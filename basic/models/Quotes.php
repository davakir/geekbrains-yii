<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotes".
 *
 * @property integer $id
 * @property integer $num_code
 * @property string $char_code
 * @property integer $nominal
 * @property integer $name
 * @property double $value
 */
class Quotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotes';
    }

    /**
     * @inheritdoc
     */
//    public function rules()
//    {
//        return [
//            [['num_code'], 'required'],
//            [['num_code', 'nominal', 'name'], 'integer'],
//            [['value'], 'number'],
//            [['char_code'], 'string', 'max' => 5],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_code' => 'Num Code',
            'char_code' => 'Char Code',
            'nominal' => 'Nominal',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
