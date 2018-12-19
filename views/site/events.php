<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="wrapper">
<h1>Добавление мероприятия</h1>
  <form method="post" action="<?= Url::to(['site/addevent']); ?>">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <label>Дата проведения мероприятия</label>
    <input type="date" name="eventdate" required="true">  
    <div>
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>
    </form>
  <hr>
<!--  <h1>Список мероприятий:</h1>
  <table>
    <tr>
        <th>Дата</th>
        <th>Количество записавшихся</th>
    </tr>
    <?php //var_dump($events); ?>
  </table>-->
</div>