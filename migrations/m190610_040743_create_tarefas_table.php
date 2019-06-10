<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarefas}}`.
 */
class m190610_040743_create_tarefas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarefas}}', [
            'id' => $this->primaryKey(),
            'data' => $this->dateTime()->notNull(),
            'descricao' => $this->text()->notNull(),
            'usuario' => $this->string(100)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarefas}}');
    }
}
