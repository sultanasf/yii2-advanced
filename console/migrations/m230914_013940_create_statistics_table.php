<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statistics}}`.
 */
class m230914_013940_create_statistics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('statistics', [
            'id' => $this->primaryKey(),
            'access_time' => $this->dateTime(),
            'user_ip' => $this->string(20),
            'user_host' => $this->string(50),
            'path_info' => $this->string(50),
            'query_string' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('statistics');
    }
}
