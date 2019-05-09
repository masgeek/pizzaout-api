<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

\app\assetmanager\AppAsset::register($this);
\app\assetmanager\BowerAsset::register($this);
//\app\assetmanager\YarnAssets::register($this);
\app\assetmanager\PortoAssets::register($this);
\app\assetmanager\FontAssets::register($this);


//$this->params['breadcrumbs'][] = ['label' => 'Rider  Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
//$this->params['breadcrumbs'][] = $this->title;

$formatter = \Yii::$app->formatter;
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
        <?php require_once __DIR__ . '/includes/customer_side_nav_left.php'; ?>
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

            <div class="col-md-12">
                <!-- start: page -->
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
