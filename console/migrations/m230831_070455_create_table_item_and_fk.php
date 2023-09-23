<?php

use yii\db\Migration;

/**
 * Class m230831_070455_create_table_item_and_fk
 */
class m230831_070455_create_table_item_and_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $this->addForeignKey(
            'category_ref',
            'item',
            'category_id',
            'item_category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('item');

        $this->dropForeignKey('category_ref', 'item');
    }
}
