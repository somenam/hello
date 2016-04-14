<?php
use yii\db\Schema;
use yii\db\Migration;

class m160414_184844_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
