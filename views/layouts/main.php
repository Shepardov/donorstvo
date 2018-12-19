<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/site.css">
    <?= Html::csrfMetaTags() ?>
    <title>Поставьте, пожалуйста, 40 баллов</title>
    <?php 
        $this->head() 
    ?>
</head>

<body>
<?php $this->beginBody() ?>

<header class="header">
        <?= Html::img('@web/img/donor.jpg', ['alt'=>'some', 'class'=>'logo']);?>
        <h1 class="text-logo"><a href="../"> Донор 2017</a></h1>
        <?php if(isset(Yii::$app->user->identity->Name)): ?>
        <div class="login-box">
            <p class="username"><?php echo(Yii::$app->user->identity->Name); ?></p>
            <a href="<?= Url::to(['site/logout']); ?>">Выйти</a>
        </div>
        <?php endif; ?>
</header>

<div class="wrap">
    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
</footer>
<?php $this->endBody() ?>
</body>

</html>
