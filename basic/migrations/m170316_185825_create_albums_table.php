<?php

use yii\db\Migration;

/**
 * Handles the creation of table `albums`.
 */
class m170316_185825_create_albums_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('albums', [
            'id' => $this->primaryKey(),
	        'ya_album_id' => $this->integer()->unique()->unsigned()->comment('Номер альбома из Яндекс.Фоток'),
	        'author' => $this->char(255)->notNull(),
	        'title' => $this->char()->null(),
	        'summary' => $this->char()->null(),
	        'img_href' => $this->char(3000)->notNull(),
	        'link_self' => $this->char(3000)->null(),
	        'link_edit' => $this->char(3000)->null(),
	        'link_photos' => $this->char(3000)->null(),
	        'link_cover' => $this->char(3000)->null(),
	        'link_ymapsml' => $this->char(3000)->null(),
	        'link_alternate' => $this->char(3000)->null(),
	        'date_edited' => $this->dateTime()->null(),
	        'date_updated' => $this->dateTime()->null(),
	        'date_published' => $this->dateTime()->null(),
	        'image_count' => $this->integer()->unsigned()->comment('Количество фотографий в альбоме')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('albums');
    }
}
