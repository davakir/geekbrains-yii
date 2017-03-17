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
	        'author' => $this->string(255)->notNull(),
	        'title' => $this->string()->null(),
	        'summary' => $this->string()->null(),
	        'img_href' => $this->string(3000)->notNull(),
	        'link_self' => $this->string(3000)->null(),
	        'link_edit' => $this->string(3000)->null(),
	        'link_photos' => $this->string(3000)->null(),
	        'link_cover' => $this->string(3000)->null(),
	        'link_ymapsml' => $this->string(3000)->null(),
	        'link_alternate' => $this->string(3000)->null(),
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
