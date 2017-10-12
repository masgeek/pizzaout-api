<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\widgets\Breadcrumbs;
use app\assetmanager\AppAsset;
use app\assetmanager\FontAssets;
use app\assetmanager\BowerAsset;

AppAsset::register($this);
BowerAsset::register($this);
FontAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/header.php'; ?>
<body>
<?php $this->beginBody() ?>

    <!-- navigation bar -->
    <?php require_once __DIR__ . '/includes/navigation.php'; ?>
    <!-- end navigation bar -->

<!-- container -->
<div class="container-fluid">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $content; ?>
</div> <!-- /container -->

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
