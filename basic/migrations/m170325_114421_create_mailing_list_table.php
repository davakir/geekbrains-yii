<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mailing_list`.
 */
class m170325_114421_create_mailing_list_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mailing_list', [
            'id' => $this->primaryKey()->comment('Суррогатный ключ записи'),
	        'user_id' => $this->integer()->notNull()->comment('Идентификатор пользователя')
        ]);
        
        $this->addForeignKey(
        	'fk_user_id',
	        'mailing_list',
	        'user_id',
	        'users',
	        'id',
	        'CASCADE',
	        'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mailing_list');
    }
}
