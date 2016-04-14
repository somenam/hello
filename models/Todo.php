<?php

namespace app\models;
use yii\db\ActiveRecord;

class Todo extends ActiveRecord 
{
    public static function tableName()
    {
        return 'todo';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'User_id']);
    }
    
}
