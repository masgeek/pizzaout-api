<?php

/* @var $this \yii\web\View */

/* @var $content string */

\app\assetmanager\AppAsset::register($this);
\app\assetmanager\BowerAsset::register($this);
\app\assetmanager\CustomAssets::register($this);
\app\assetmanager\FontAssets::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/head.php'; ?>
<body>
<?php $this->beginBody() ?>
<!-- begin body content here -->
<section class="body">
    <div class="inner-wrapper">
        <?= $content ?>
    </div>
</section>
<!-- end body content here -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
