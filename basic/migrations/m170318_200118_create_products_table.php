<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m170318_200118_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
	        'img_url' => $this->string(3000)->notNull(),
	        'price' => $this->integer()->notNull(),
	        'description' => $this->text()->null(),
	        'producer_id' => $this->integer()->notNull()
        ]);
        
        $this->addForeignKey(
        	'fk_producer_id',
	        'products',
	        'producer_id',
	        'producers',
	        'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
