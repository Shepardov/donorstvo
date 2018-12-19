<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Users;
?>

<div class="wrapper">
<h1>Управление пользователями</h1>
  <table>
    <tr>
      <th>Имя</th>
      <th>Фамилия</th>
      <th>Email</th>
      <th>Редактировать</th>
    </tr>
    <?php 
    //Грязь. Не повторяйте такого дома
    foreach ($users as $value) {
      echo('<tr><td>'.$value->Name.'</td>
                <td>'.$value->Surname.'</td>
                <td>'.$value->Email.'</td>
                <td><a href="'.Url::to(["site/adminedit", "id" => $value->ID_Users]).'" class="button small">Редактировать</a></td>
                </tr>');
    }
    ?>
  </table>
</div>