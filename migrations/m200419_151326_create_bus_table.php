<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%bus}}`.
 */
class m200419_151326_create_bus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bus}}', [
            'id'    => $this->primaryKey(),
            'name'  => Schema::TYPE_STRING . ' NOT NULL',
            'speed' => Schema::TYPE_INTEGER . ' NOT NULL',
        ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bus}}');
    }
}
