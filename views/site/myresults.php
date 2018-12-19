<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<div class="wrapper">
   <h1>Мои результаты</h1>
   <h3>Это список ваших прошлых сдач крови</h3>
   <table>
   	<tr>
   		<th>Дата</th>
   		<th>Количество крови в мл</th>
   		<th>Группа крови</th>
   	</tr>
    <?php 
      foreach ($myresults as $value) {
        echo '<tr>
        <td>'.$value->events[0]->Date.'</td>
        <td>'.$value->BloodDonated.'</td>
        <td>'.$value->users[0]->BloodType.'</td>
        </tr>';
      }
    ?>
   </table>
</div> 