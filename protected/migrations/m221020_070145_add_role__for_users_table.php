<?php

class m221020_070145_add_role__for_users_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn("users", "role", "TINYINT NOT NULL DEFAULT 0");
	}

	public function down()
	{
		$this->dropColumn("users", "role");

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