<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="wrapper">
   <h1>Редактирование профиля</h1>
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'email')->input('email') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'surname') ?>
    <!--
        По умолчанию, конструктор форм в Yii2 
        не имеет генератора полей типа Date. Так что
        здесь я написал его сам.
     -->
    <div class="form-group field-signupform-birthdate required">
        <label for="DateOfBirth">Дата рождения</label>
        <input type="date" name="EditForm[birthdate]" required="true">
    </div>
    <?= $form->field($model, 'gender')->dropDownList(['M' => 'М', 'F' => 'Ж']) ?>
    <?= $form->field($model, 'bloodtype')->dropDownList([
        '1' => '1', 
        '2' => '2', 
        '3' => '3',
        '4' => '4'
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Применить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
</div> 