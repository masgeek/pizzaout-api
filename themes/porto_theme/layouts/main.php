<?php

/* @var $this View */

/* @var $content string */

use app\assetmanager\AppAsset;
use app\assetmanager\BowerAsset;
use app\assetmanager\FontAssets;
use app\assetmanager\PortoAssets;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use kartik\alert\AlertBlock;

BowerAsset::register($this);
AppAsset::register($this);
//\app\assetmanager\YarnAssets::register($this);
PortoAssets::register($this);
FontAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php require_once __DIR__ . '/includes/head.php'; ?>
<body>
<?php $this->beginBody() ?>
<!-- begin body content here -->
<section class="body">
    <!-- start: header -->
    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <?php require_once __DIR__ . '/includes/side_nav_left.php'; ?>
        <!-- end: sidebar -->
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?= $this->title ?></h2>
                <div class="right-wrapper pull-right">
                    <?=
                    Breadcrumbs::widget([
                        'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links,
                        'activeItemTemplate' => "<li style='color: red;'>{link}</li>",
                        //'tag' => 'ol',
                        'options' => [
                            'class' => 'breadcrumbs'
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]); ?>

                    <!--<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>-->
                </div>
            </header>

            <!--?=AlertBlock::widget([
                'useSessionFlash' => true,
                'delay' => 5000,
                'type' => AlertBlock::TYPE_ALERT
            ]);?-->

            <!-- start: page -->
            <?= \app\widgets\Alert::widget() ?>
            <?= $content ?>
            <!-- end: page -->
        </section>
    </div>

    <!-- right sidebar -->
    <?php //require_once __DIR__ . '/includes/side_nav_right.php'; ?>
    <!-- end right sidebar -->
</section>
<!-- end body content here -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
