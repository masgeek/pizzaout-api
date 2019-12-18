<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\widgets\Breadcrumbs;

\app\assetmanager\AppAsset::register($this);
\app\assetmanager\BowerAsset::register($this);
\app\assetmanager\PortoAssets::register($this);
\app\assetmanager\FontAssets::register($this);

//$this->params['breadcrumbs'][] = ['label' => 'Rider  Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
//$this->params['breadcrumbs'][] = $this->title;

$logo = \app\helpers\APP_UTILS::BuildImageUrl("logo.png", false, "images/app_images");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/head.php'; ?>
<body>
<?php $this->beginBody() ?>
<!-- begin body content here -->
<section class="body-sign">
    <div class="center-sign">
<!--        <a href="#" class="logo pull-left">-->
<!--            <img src="--><?//= $logo ?><!--" height="54" alt="Pizza Out Logo"/>-->
<!--        </a>-->
        <?= $content ?>
    </div>
</section>
<!-- end body content here -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
