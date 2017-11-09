<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

?>
<header>
    <nav>
        <div class="row">
            <!--<img src="./assets/img/logo-white.png" alt="Omnifood logo" class="logo">-->
            <?= Html::img('@omnifood/img/logo-white.png', ['alt' => 'Pizza Slice', 'class' => 'logo']); ?>
            <ul class="main-nav">
                <li><a href="#">Food delivery</a></li>
                <li><a href="#">How it works</a></li>
                <li><a href="#">Our cities</a></li>
                <li><a href="#">Sign up</a></li>
            </ul>
        </div>
    </nav>
    <div class="hero-text-box">
        <h1>Goodbye junk food. <br/>Hello super healthy meals.</h1>
        <a class="btn btn-full" href="#">I'm hungry</a>
        <a class="btn btn-ghost" href="#">Show me more</a>
    </div>
</header>