<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%driver}}`.
 */
class m200419_152023_create_driver_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%driver}}', [
            'id'        => $this->primaryKey(),
            'full_name' => \yii\db\Schema::TYPE_STRING,
            'birthday'  => \yii\db\Schema::TYPE_DATETIME,
            'bus'       => \yii\db\Schema::TYPE_INTEGER . ' NOT NULL',
        ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
        );

        $this->addForeignKey('driver_bus', '{{%driver}}', 'bus', 'bus', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%driver}}');
    }
}
