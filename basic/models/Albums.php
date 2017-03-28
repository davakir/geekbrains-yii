<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "albums".
 *
 * @property integer $id
 * @property integer $ya_album_id
 * @property string $author
 * @property string $title
 * @property string $summary
 * @property string $img_href
 * @property string $link_self
 * @property string $link_edit
 * @property string $link_photos
 * @property string $link_cover
 * @property string $link_ymapsml
 * @property string $link_alternate
 * @property string $date_edited
 * @property string $date_updated
 * @property string $date_published
 * @property integer $image_count
 */
class Albums extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'albums';
    }
	
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
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
            [['ya_album_id', 'image_count'], 'integer'],
            [['author', 'img_href'], 'required'],
            [['date_edited', 'date_updated', 'date_published'], 'safe'],
            [['author'], 'string', 'max' => 255],
            [['title', 'summary'], 'string', 'max' => 1],
            [['img_href', 'link_self', 'link_edit', 'link_photos', 'link_cover', 'link_ymapsml', 'link_alternate'], 'string', 'max' => 3000],
            [['ya_album_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ya_album_id' => 'Ya Album ID',
            'author' => 'Author',
            'title' => 'Title',
            'summary' => 'Summary',
            'img_href' => 'Img Href',
            'link_self' => 'Link Self',
            'link_edit' => 'Link Edit',
            'link_photos' => 'Link Photos',
            'link_cover' => 'Link Cover',
            'link_ymapsml' => 'Link Ymapsml',
            'link_alternate' => 'Link Alternate',
            'date_edited' => 'Date Edited',
            'date_updated' => 'Date Updated',
            'date_published' => 'Date Published',
            'image_count' => 'Image Count',
        ];
    }
}
