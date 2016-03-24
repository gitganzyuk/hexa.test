<?php

use yii\db\Migration;

class m160324_075404_create_table_Post extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
            'date' => $this->integer()->notNull(),
            'post' => $this->text()->notNull(),
            'tags' => $this->text(),
            'image' => $this->string(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }

}
