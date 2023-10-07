<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m231005_032002_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime(),
            'customer_id' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'fk-order-customer_id',
            'order',
            'customer_id',
            'customer',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
