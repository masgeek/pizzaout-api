<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

$registerLink = \yii\helpers\Url::to(['user/register']);
$loginLink = \yii\helpers\Url::to(['site/login']);

$logo = \app\helpers\APP_UTILS::BuildImageUrl("logo.png", false, "images/app_images");
?>
<header>
    <nav>
        <div class="row">
            <!--<img src="./assets/img/logo-white.png" alt="Omnifood logo" class="logo">-->
            <?= Html::img($logo, ['alt' => 'Pizza Out', 'class' => 'logo']); ?>
            <ul class="main-nav">
                <li><a href="#">Food delivery</a></li>
                <li><a href="#">How it works</a></li>
                <li><a href="#">Our cities</a></li>
            </ul>
        </div>
    </nav>
    <div class="hero-text-box">
        <h1>Hello delicious pizza.</h1>
        <?= Html::a('Login', $loginLink, ['class' => 'btn btn-full']) ?>
        <?= Html::a('Sign Up', $registerLink, ['class' => 'btn btn-ghost']) ?>
    </div>
</header>