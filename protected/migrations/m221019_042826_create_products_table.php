<?php

class m221019_042826_create_products_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('products',[
			"id" => "pk",
            "title" => "string  NOT NULL",
			"sum" => "FLOAT NOT NULL",
			"img" => "string NOT NULL",
			"status" => "TINYINT DEFAULT 0",
			"category_id" => "INTEGER NOT NULL",
			"created_at" => "TIMESTAMP DEFAULT CURRENT_TIMESTAMP",	
			"updated_at" => "DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",	
			"is_deleted" => "TINYINT DEFAULT 0",
		]);

		$this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

		$this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

		
	}

	public function down()
	{
		$this->dropForeignKey(
            'fk-products-category_id',
            'products'
        );

		$this->dropIndex(
            'idx-products-category_id',
            'products'
        );

		$this->dropTable('products');

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