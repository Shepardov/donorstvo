<?php 
	use yii\helpers\Url;
?>
<div class="wrapper">
   <ul id="menu">       
       <li><a href="<?= Url::to(['site/manage']); ?>" class="button">Пользователи</a></li>
       <li><a href="<?= Url::to(['site/events']); ?>" class="button">Мероприятия</a></li>     
       <li><a href="<?= Url::to(['site/certify']); ?>" class="button">Сертификаты</a></li>
   </ul> 
</div> 