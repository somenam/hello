<?php
use yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin(['class' => 'form-horisontal']);
?>
<?= $form->field($model, 'name')->textInput(['autofocus'=>true]);?>
<?= $form->field($model, 'password')->passwordInput();?>

<div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php
ActiveForm::end();
?>
<h1>user signup</h1>

