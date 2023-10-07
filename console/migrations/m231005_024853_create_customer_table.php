<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m231005_024853_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-customer-user_id',
            'customer',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer}}');
    }
}
