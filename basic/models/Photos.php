<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property integer $photo_id
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
 * @property integer $visible
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
    public function rules()
    {
        return [
            [['ya_photo_id', 'album_id'], 'required'],
            [['ya_photo_id', 'album_id', 'visible'], 'integer'],
            [['title', 'summary'], 'string'],
            [['hide_original'], 'boolean'],
            [['author', 'access'], 'string', 'max' => 50],
            [['date_created', 'date_updated'], 'string', 'max' => 255],
            [['img_href', 'link_album'], 'string', 'max' => 3000],
            [['ya_photo_id'], 'unique'],
            [['ya_photo_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo_id' => 'Photo ID',
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
