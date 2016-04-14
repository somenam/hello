<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'My todo list';
//var_dump(Yii::$app->user->identity->id);exit;
?>
<div id="content">
    
    <ul id='list_todo' class="list-group">
        
    </ul>
    
    
    <form role="form">
  <div class="form-group" id="todo_form">
      <div>Создайте новое todo</div>
    <label for="todo_title">title</label>
    <input type="text" class="form-control" id="todo_title">
    <label for="todo_content">todo</label>
    <textarea id="todo_content" class="form-control" rows="3"></textarea>
    <button type="button" id="create_todo" class="btn btn-primary" style="margin-top: 10px;">Принять</button>
  </div>
  
</form>
    
</div>
    <div id="user_list">
<?php 
        echo '<ul class="list-group">';
        echo '<li id="owner" class="list-group-item list-group-item-warning user">Мои todo</li>';
        foreach ($model as $user) {
            if($user->id != Yii::$app->user->identity->id){
             echo '<li id="'. $user->id .'" class="list-group-item list-group-item-success user">'. $user->name.'</li>';
            }
        }
        echo '</ul>';
?>
    </div>
    <div style="clear: both"></div>

