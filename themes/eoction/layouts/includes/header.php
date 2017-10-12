<?php
use yii\helpers\Html;
?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!--<link rel="shortcut icon" href="<?= Yii::$app->basePath; ?>/images/hammer-icon.png?v=1" type="image/x-icon" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="dns-prefetch" href="http://fonts.googleapis.com/">
    <?= Html::csrfMetaTags() ?>
    <title><?=Html::encode($this->title); ?></title>
    <?php $this->head() ?>
</head>