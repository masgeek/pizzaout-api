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

<div class="col-md-8 col-md-offset-2">
    <!-- start: page -->
    <?= $content ?>
    <!-- end: page -->
</div>
<!-- end body content here -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
