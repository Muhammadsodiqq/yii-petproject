<?php

class m221018_095123_create_categories_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('categories',[
			"id" => "pk",
            "title" => "string NOT NULL",
			"status" => "string NOT NULL",
		]);
	}

	public function down()
	{
		echo "m221018_095123_create_categories_table does not support migration down.\n";
		return false;
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