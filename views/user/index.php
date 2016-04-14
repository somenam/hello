<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'My first page';
//var_dump(Yii::$app->user->identity->id);exit;
?>
<div>
    <h1>User index page</h1>
    <h2>мой id - <?= Yii::$app->user->identity->id ?></h2>
</div>