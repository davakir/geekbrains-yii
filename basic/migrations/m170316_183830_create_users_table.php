<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170316_183830_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
    	$this->createTable('roles', [
    		'id' => $this->primaryKey(),
		    'name' => $this->char(255)->notNull()
	    ]);
    	
        $this->createTable('users', [
            'id' => $this->primaryKey(),
	        'login' => $this->char(64)->unique(),
	        'password' => $this->char(64)->notNull(),
	        'email' => $this->char(255)->null(),
	        'role_id' => $this->integer(3)->unsigned()->notNull(),
	        'is_admin' => $this->boolean()->defaultValue(false),
	        'is_default' => $this->boolean()->defaultValue(false)
        ]);
        
        $this->addForeignKey(
        	'fk_role_role_id',
	        'users',
	        'role_id',
	        'roles',
            'id',
	        'NO ACTION',
	        'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
	    $this->dropTable('users');
	    $this->dropTable('roles');
    }
}
