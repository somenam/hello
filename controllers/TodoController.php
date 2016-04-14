<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\User;
use app\models\Todo;

class TodoController extends Controller
{

    public function actionIndex()
    {
        $model = User::find()->all();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new Todo();
        $userId = Yii::$app->user->identity->id;
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $model->title = $_POST['title'];
            $model->content = $_POST['content'];
            $model->user_id = $userId;
            $model->save();
        }
        return $this->responseAjax($userId);
    }

    public function actionGet()
    {
        $userId = Yii::$app->user->identity->id;
        if (isset($_POST['id'])) {
            $userId = $_POST['id'];
        }
        return $this->responseAjax($userId);
    }
    
    public function actionDelete()
    {
        $userId = Yii::$app->user->identity->id;
        if (isset($_POST['todoId'])) {
            $todo = Todo::findOne($_POST['todoId']);
            $todo->delete();
        }
        return $this->responseAjax($userId);
    }
    
    public function actionUpdate()
    {
        $userId = Yii::$app->user->identity->id;
        if (isset($_POST['todoId']) && isset($_POST['title']) && isset($_POST['content'])) {
            $todo = Todo::findOne($_POST['todoId']);
            $todo->title = $_POST['title'];
            $todo->content = $_POST['content'];
            $todo->save();
        }
        return $this->responseAjax($userId);
    }
    
    protected function responseAjax($userId)
    {
        $user = User::findIdentity($userId);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $user->todos;
    }

}
