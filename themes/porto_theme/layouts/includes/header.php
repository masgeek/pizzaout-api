<?php

use yii\helpers\Html;

?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <meta name="keywords" content="HTML5 Pizza Android IOS"/>
    <meta name="description" content="Pizza Ordering Application">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!--<link rel="dns-prefetch" href="http://fonts.googleapis.com/">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets2/vendor/bootstrap/css/bootstrap.css"/>

    <link rel="stylesheet" href="assets2/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="assets2/vendor/magnific-popup/magnific-popup.css"/>
    <link rel="stylesheet" href="assets2/vendor/bootstrap-datepicker/css/datepicker3.css"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets2/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
    <link rel="stylesheet" href="assets2/vendor/bootstrap-multiselect/bootstrap-multiselect.css"/>
    <link rel="stylesheet" href="assets2/vendor/morris/morris.css"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets2/stylesheets/theme.css"/>

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets2/stylesheets/skins/default.css"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets2/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <!--<script src="assets2/vendor/modernizr/modernizr.js"></script>-->
</head>