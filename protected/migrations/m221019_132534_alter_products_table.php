<?php

class m221019_132534_alter_products_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn("products", "body", "TEXT NOT NULL");
	}

	public function down()
	{
		echo "m221019_132534_alter_products_table does not support migration down.\n";
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