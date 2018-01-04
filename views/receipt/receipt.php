<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

?>
<div class="site">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-success">
        <?= nl2br(Html::encode($message)) ?>
    </div>

</div>
