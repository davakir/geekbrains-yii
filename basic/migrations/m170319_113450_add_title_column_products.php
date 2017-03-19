<?php

use yii\db\Migration;

class m170319_113450_add_title_column_products extends Migration
{
    public function up()
    {
		$this->addColumn(
			'products',
			'name',
			'string'
		);
    }

    public function down()
    {
        $this->dropColumn('products', 'name');
    }
}
