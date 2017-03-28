<?php

use yii\db\Migration;

class m170328_163000_alter_users_table extends Migration
{
    public function up()
    {
		$this->addColumn(
			'users',
			'in_mailing_list',
			'boolean'
		);
    }

    public function down()
    {
        $this->dropColumn('users', 'in_mailing_list');
    }
}
