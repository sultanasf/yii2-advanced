<?php

use yii\db\Migration;

/**
 * Class m230831_065940_create_table_item_category
 */
class m230831_065940_create_table_item_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_category' => $this->integer(10)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('item_category');
    }
}
