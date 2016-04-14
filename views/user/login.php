<?php
use yii\widgets\ActiveForm;
?>
<div>Пройдите Аутентификацию</div>
<?php
$form = ActiveForm::begin(['class' => 'form-horisontal']);
?>
<?= $form->field($model, 'name')->textInput(['autofocus'=>true]);?>
<?= $form->field($model, 'password')->passwordInput();?>

<div>
    <button type="submit" class="btn btn-primary">Login</button>
</div>

<?php
ActiveForm::end();
?>
<h1>user login</h1>