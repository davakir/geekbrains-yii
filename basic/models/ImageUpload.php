<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class ImageUpload
 * @package app\models
 */
class ImageUpload extends Model
{
	public $image;
	
	/**
	 * Uploads the file and returns its name.
	 *
	 * @param UploadedFile $image
	 * @return string
	 */
	public function uploadFile(UploadedFile $image)
	{
		try
		{
			$image->saveAs(\Yii::getAlias('@webroot') . '/main/img/' . $image->baseName . '.' . $image->extension);
			return $image->baseName . '.' . $image->extension;
		}
		catch (\Exception $e)
		{
			/* DBLog should be here */
		}
		
		return '';
	}
}