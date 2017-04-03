<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotes`.
 */
class m170402_215509_create_quotes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quotes', [
            'id' => $this->string('10'),
	        'num_code' => $this->string(),
	        'char_code' => $this->string(5),
	        'nominal' => $this->string(),
	        'name' => $this->string(),
	        'value' => $this->string()
        ]);
        
        $this->addPrimaryKey(
        	'pk_quotes_id',
	        'quotes',
	        'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quotes');
    }
}
