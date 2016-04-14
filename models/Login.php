<?php

namespace app\models;


use yii\base\Model;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 */
class Login extends Model
{
    public $name;
    public $password;
   
    public function rules()
    {
        //parent::rules();
        return [
            [['name', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        $user = $this->getUser();
        if(!$user){
            $this->addError($attribute, 'Incorrect password or login');
        }
    }
    
    public function getUser()
    {
        return User::findOne(['name'=>  $this->name, 'password'=> md5($this->password)]);
    }
}
