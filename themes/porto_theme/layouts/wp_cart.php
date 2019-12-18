<?php

/* @var $this View */

/* @var $content string */

use app\assetmanager\AppAsset;
use app\assetmanager\BowerAsset;
use app\assetmanager\FontAssets;
use app\assetmanager\WpCartAssets;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

AppAsset::register($this);
BowerAsset::register($this);
WpCartAssets::register($this);
FontAssets::register($this);


$formatter = Yii::$app->formatter;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/head.php'; ?>
<body>
<?php $this->beginBody() ?>
<!-- begin body content here -->

<div class="container">
    <?= \app\widgets\Alert::widget() ?>
    <!-- start: page -->
    <?= $content ?>
    <!-- end: page -->
</div>
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
