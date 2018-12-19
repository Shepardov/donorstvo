 <?php 
	use yii\helpers\Url;
?>
    <h2>Вход</h2>
    <form class="sign_form" action="<?= Url::to(['site/auth']); ?>" method="post">
		<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <label>Email:</label>
        <input type="Email" name="email">
        <br>
        <label>Пароль:</label>
        <input type="Password" name="password">
        <br>
        <input type="submit" value="Войти">
    </form>
