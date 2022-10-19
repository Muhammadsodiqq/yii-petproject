<?php

class m221019_052843_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
            'id' => 'pk',
            'username' =>'string NOT NULL UNIQUE',
            'password' =>'string NOT NULL',
			"created_at" => "TIMESTAMP DEFAULT CURRENT_TIMESTAMP",	
			"updated_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",	
			"is_deleted" => "TINYINT DEFAULT 0",
		));

		$this->addColumn("products", "user_id", "INTEGER NOT NULL");

		$this->addForeignKey(
            'fk-products-user_id',
            'products',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

	}

	public function down()
	{

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}