<?php 
  use yii\helpers\Html;
  use yii\helpers\ArrayHelper;
  use yii\bootstrap\ActiveForm;
  use app\models\Events;
?>

<div class="wrapper">
  <h1>Запись на сдачу крови</h1>
    <?php $form = ActiveForm::begin(); 
      $dates = Events::find()->all();
      $items = ArrayHelper::map($dates, 'ID_Event','Date');
      $params = [
        'prompt' => 'Укажите дату записи'
    ];
    ?>
    <?= $form->field($model, 'date')->dropDownList($items) ?>    
    <div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
<?php ActiveForm::end() ?>
</div> 