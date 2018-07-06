<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

\app\assetmanager\AppAsset::register($this);
\app\assetmanager\BowerAsset::register($this);
\app\assetmanager\WpCartAssets::register($this);
\app\assetmanager\FontAssets::register($this);


$formatter = \Yii::$app->formatter;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/head.php'; ?>
<body>
<?php $this->beginBody() ?>
<!-- begin body content here -->

<div class="container">
    <!-- start: page -->
    <?= $content ?>
    <!-- end: page -->
</div>
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
