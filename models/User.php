<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }
    
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['user_id' => 'id']);
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }
    public function getId()
    {
        return $this->id;
    }
            
    public function getAuthKey()
    {
        
    }
    public function validateAuthKey($authKey)
    {
        
    }
    
}
