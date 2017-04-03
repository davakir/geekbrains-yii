<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotes_history`.
 */
class m170403_201550_create_quotes_history_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quotes_history', [
            'id' => $this->string(10),
	        'num_code' => $this->string(),
	        'char_code' => $this->string(5),
	        'nominal' => $this->string(),
	        'name' => $this->string(),
	        'value' => $this->string(),
	        'date' => $this->dateTime()
        ]);
        
        $this->addPrimaryKey(
        	'pk_quotes_history',
	        'quotes_history',
	        ['id', 'date']
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quotes_history');
    }
}
