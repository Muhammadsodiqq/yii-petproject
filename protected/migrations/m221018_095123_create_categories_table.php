<?php

class m221018_095123_create_categories_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('categories', [
			"id" => "pk",
			"title" => "string  NOT NULL",
			"status" => "TINYINT DEFAULT 0",
			"created_at" => "TIMESTAMP DEFAULT CURRENT_TIMESTAMP",
			"updated_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
			"is_deleted" => "TINYINT DEFAULT 0",
		]);

		$this->createIndex(
			'idx-categories-is_deleted',
			'categories',
			'is_deleted'
		);

	}

	public function down()
	{

		$this->dropIndex(
			'idx-categories-is_deleted',
			'categories'
		);

		$this->dropTable('categories');
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
