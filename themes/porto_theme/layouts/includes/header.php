<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

$logo = \app\helpers\APP_UTILS::BuildImageUrlBase("logo.png", "images/app_images");
$user_image = \app\helpers\APP_UTILS::BuildImageUrlBase("!logged-user.jpg", "images/app_images");


?>

<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <img src="<?= $logo ?>" height="35" alt="Pizza Out"/>
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
             data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <span class="separator"></span>

        <?php if (!Yii::$app->user->isGuest): ?>
            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="<?= $user_image ?>" alt="<?= Yii::$app->user->identity->username ?>"
                             class="img-circle"
                             data-lock-picture="<?= $user_image ?>"/>
                    </figure>
                    <div class="profile-info" data-lock-name="<?= Yii::$app->user->identity->username ?>"
                         data-lock-email="support@tsobu.co.ke">
                        <span class="name"><?= Yii::$app->user->identity->username ?></span>
                        <span class="role"><?= Yii::$app->user->identity->usertype ?></span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i>
                                My Profile</a>
                        </li>
                        <?= Html::beginForm(['/site/logout'], 'post') ?>
                        <li>
                            <?= Html::submitButton('<i class="fa fa-power-off"></i> Logout', ['class' => 'btn btn-link', 'role' => 'menuitem', 'tabindex' => '-1']) ?>
                        </li>
                        <?= Html::endForm() ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- end: search & user box -->
</header>