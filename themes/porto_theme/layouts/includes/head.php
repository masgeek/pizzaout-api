<?php

use yii\helpers\Html;

?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <meta name="keywords" content="HTML5 Pizza Android IOS"/>
    <meta name="description" content="Pizza Ordering Application">
    <meta name="author" content="Sammy Barasa <barsaamms@gmail.com>">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="dns-prefetch" href="http://fonts.googleapis.com/">

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="57x57"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= Yii::$app->request->baseUrl; ?>/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
          content="<?= Yii::$app->request->baseUrl; ?>/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
</head>