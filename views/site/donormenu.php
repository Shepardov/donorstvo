<?php 
	use yii\helpers\Url;
?>
<div class="wrapper">
   <ul id="menu">       
       <li><a href="<?= Url::to(['site/recording']); ?>" class="button">Я хочу сдать кровь</a></li>
       <li><a href="<?= Url::to(['site/edit']); ?>" class="button">Редактирование профиля</a></li>     
       <li><a id="contacts" class="button">Контакты</a></li>    
       <li><a href="<?= Url::to(['site/myresults']); ?>" class="button">Мои результаты</a></li>
   </ul> 
</div> 
<script type="text/javascript">
	let contacts = document.getElementById('contacts');
	contacts.addEventListener('click', () => {

		let popupMessage = document.createElement('div');
		popupMessage.classList.add('popup');
		popupMessage.innerHTML = '<h3>Контакты</h3><p></p>';

		let wrapper = document.querySelector('.wrapper');
		let menu = document.getElementById('menu');
		wrapper.insertBefore(popupMessage, menu);
	});
</script>