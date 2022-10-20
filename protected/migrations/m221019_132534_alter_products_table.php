<?php

class m221019_132534_alter_products_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn("products", "body", "TEXT NOT NULL");
	}

	public function down()
	{
		$this->dropColumn("products", "body");
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