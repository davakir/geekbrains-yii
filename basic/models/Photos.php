<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "photos".
 *
 * @property integer $id
 * @property integer $ya_photo_id
 * @property integer $album_id
 * @property string $author
 * @property string $date_created
 * @property string $date_updated
 * @property string $title
 * @property string $summary
 * @property boolean $hide_original
 * @property string $access
 * @property string $img_href
 * @property string $link_album
 * @property boolean $visible
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }
	
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'date_created',
				'updatedAtAttribute' => 'date_updated',
				'value' => new Expression('NOW()'),
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ya_photo_id', 'album_id', 'title', 'summary'], 'required'],
            [['ya_photo_id', 'album_id'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['hide_original', 'visible'], 'boolean'],
            [['author'], 'string', 'max' => 255],
            [['title', 'summary'], 'string', 'max' => 1],
            [['access'], 'string', 'max' => 50],
            [['img_href', 'link_album'], 'string', 'max' => 3000],
            [['ya_photo_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ya_photo_id' => 'Ya Photo ID',
            'album_id' => 'Album ID',
            'author' => 'Author',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'title' => 'Title',
            'summary' => 'Summary',
            'hide_original' => 'Hide Original',
            'access' => 'Access',
            'img_href' => 'Img Href',
            'link_album' => 'Link Album',
            'visible' => 'Visible',
        ];
    }
}
