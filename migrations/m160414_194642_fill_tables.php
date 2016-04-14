<?php

use yii\db\Migration;

class m160414_194642_fill_tables extends Migration
{

    public function up()
    {
        for ($i = 1; $i <= 6; $i++) {
            $this->insert('user', [
                'id' => $i,
                'name' => 'user' . $i,
                'password' => md5('user' . $i),
            ]);
            for ($j = 1; $j <= 6; $j++) {
                $this->insert('todo', [
                    'title' => 'user' . $i . 'todo' . $j,
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                    'user_id' => $i,
                ]);
            }
        }
    }

    public function down()
    {
        echo "m160414_194642_fill_tables cannot be reverted.\n";

        return false;
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
