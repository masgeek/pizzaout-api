<?php

/* @var $this \yii\web\View */

/* @var $content string */

\app\assetmanager\OmniThemeAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/head.php'; ?>
<body>
<?php $this->beginBody() ?>
<!-- begin body content here -->
<!-- start: header -->
<?php require_once __DIR__ . '/includes/header.php'; ?>
<!-- end: header -->


<!-- start: page -->
<?= $content ?>
<!-- end: page -->
<!-- end body content here -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
