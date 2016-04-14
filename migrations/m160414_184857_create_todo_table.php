<?php
use yii\db\Schema;
use yii\db\Migration;

class m160414_184857_create_todo_table extends Migration
{
    public function up()
    {
        $this->createTable('todo', [
            'id' => $this->primaryKey(),
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('todo');
    }
}
