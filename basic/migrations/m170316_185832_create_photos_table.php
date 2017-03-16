<?php

use yii\db\Migration;

/**
 * Handles the creation of table `photos`.
 */
class m170316_185832_create_photos_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('photos', [
            'id' => $this->primaryKey(),
	        'ya_photo_id' => $this->integer()->unique()->unsigned()->notNull()->comment('Номер фотографии из Яндекс.Фоток'),
	        'album_id' => $this->integer()->unsigned()->notNull()->comment('Номер альбома из Яндекс.Фоток'),
	        'author' => $this->char(255)->null(),
	        'date_created' => $this->dateTime()->null(),
	        'date_updated' => $this->dateTime()->null(),
	        'title' => $this->char()->notNull(),
	        'summary' => $this->char()->notNull(),
	        'hide_original' => $this->boolean()->defaultValue(false),
	        'access' => $this->char(50)->null(),
	        'img_href' => $this->char(3000)->null(),
	        'link_album' => $this->char(3000)->null(),
	        'visible' => $this->boolean()->defaultValue(true)->comment('Видимость на сайте')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('photos');
    }
}
