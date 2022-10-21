<?php

class m221021_110515_alter_products_table extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey(
            'fk-products-user_id',
            'products'
        );

		$this->addForeignKey(
            'fk-products-user_id',
            'products',
            'user_id',
            'tbl_users',
            'id',
            'CASCADE'
        );
	}

	public function down()
	{
		echo "m221021_110515_alter_products_table does not support migration down.\n";
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