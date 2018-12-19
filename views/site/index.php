<?php 
	use yii\helpers\Url;
?>
<div class="wrapper">
   <ul>       
       <li><a href="<?= Url::to(['site/signup']); ?>" class="button">Я хочу стать донором</a></li>     
       <li><a href="<?= Url::to(['site/signin']); ?>" class="button">Я уже донор</a></li>    
       <li><a href="<?= Url::to(['site/about']); ?>" class="button">Я хочу узнать больше о проекте</a></li>
   </ul> 
</div> 
