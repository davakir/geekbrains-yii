<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m170316_183958_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
	        'title' => $this->string(255)->notNull(),
	        'content' => $this->text()->notNull(),
	        'author' => $this->integer()->unsigned()->notNull(),
	        'date_created' => $this->dateTime()
        ]);
        
        $this->addForeignKey(
        	'fk_author_user_id',
	        'articles',
	        'author',
	        'users',
	        'id',
	        'NO ACTION'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articles');
    }
}
