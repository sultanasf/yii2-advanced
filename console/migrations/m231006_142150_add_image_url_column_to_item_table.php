<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%item}}`.
 */
class m231006_142150_add_image_url_column_to_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('item', 'image_url', $this->string()->after('price'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('item', 'image_url');
    }
}
