<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php if (!\Yii::$app->user->isGuest): ?>
  <div class="site-index">Здесь ничо нет</div>
<?php else: ?>
  <div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">Вы должны залогиниться или зарегистрироваться.</p>

    </div>

</div>
<?php endif; ?>

  
  
  