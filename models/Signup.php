<?php

namespace app\models;


use yii\base\Model;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 */
class Signup extends Model
{
    public $name;
    public $password;
   
    public function rules()
    {
        //parent::rules();
        return [
            [['name', 'password'], 'required'],
            ['password', 'string', 'min'=>4, 'max'=>12]
        ];
    }
    
    public function signup()
    {
        $user = new User();
        $user->name = $this->name;
        $user->setPassword($this->password);
        return $user->save();
    }
}
