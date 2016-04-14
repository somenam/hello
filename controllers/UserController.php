<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Signup;
use app\models\Login;
use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionSignup()
    {
        $model = new Signup();
        
        if(isset($_POST['Signup'])){
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup()){
                $this->redirect(\Yii::$app->urlManager->createUrl("user/login"));
            }
        }
        
        return $this->render('signup', ['model' => $model]);
    }
    
    public function actionLogin()
    {
        $model = new Login();
        if(isset($_POST['Login'])){
            $model->attributes = Yii::$app->request->post('Login');
             if($model->validate()){
                 Yii::$app->user->login($model->getUser());
                 $this->redirect(\Yii::$app->urlManager->createUrl("todo/index"));
            }
        }
        return $this->render('login', ['model' => $model]);
    }
}
