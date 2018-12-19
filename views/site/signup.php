<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="wrapper">
    <h1>Регистрация донора</h1>
    <h4>Пожалуйста, заполните всю информацию, чтобы зарегистрироваться в качестве донора</h4>
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'email')->input('email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'surname') ?>
        <!--
        По умолчанию, конструктор форм в Yii2 
        не имеет генератора полей типа Date. Так что
        здесь я написал его сам.
     -->
    <div class="form-group field-signupform-birthdate required">
        <label for="DateOfBirth">Дата рождения</label>
        <input type="date" name="SignupForm[birthdate]" required="true">
    </div>
    <?= $form->field($model, 'gender')->dropDownList(['M' => 'М', 'F' => 'Ж']) ?>
    <?= $form->field($model, 'bloodtype')->dropDownList([
        '1' => '1', 
        '2' => '2', 
        '3' => '3',
        '4' => '4'
    ]) ?>
    <div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
<?php ActiveForm::end() ?>
</div>
<footer></footer>
<script>

</script>
