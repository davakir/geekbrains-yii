<?php

use yii\db\Migration;

/**
 * Handles the creation of table `producers`.
 */
class m170318_200045_create_producers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('producers', [
            'id' => $this->primaryKey(),
	        'name' => $this->string(512)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('producers');
    }
}
