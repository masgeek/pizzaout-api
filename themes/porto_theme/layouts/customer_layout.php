<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

\app\assetmanager\AppAsset::register($this);
\app\assetmanager\BowerAsset::register($this);
//\app\assetmanager\YarnAssets::register($this);
\app\assetmanager\CustomAssets::register($this);
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

            <div class="col-md-9">
                <!-- start: page -->
                <?= $content ?>
                <!-- end: page -->
            </div>
            <div class="col-lg-3 col-md-3">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                            <!--<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>-->
                        </div>
                        <?php $title = isset($this->params['title']) ? $this->params['title'] : ''; ?>
                        <h2 class="panel-title"><?= $title ?></h2>
                    </header>
                    <div class="panel-body">
                        <table data-height="auto" class="table table-condensed table-border">
                            <!--<thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th width="65%">Name/Options</th>
                                <th class="text-left">Price</th>
                                <th class="text-right">Sub Total</th>
                            </tr>
                            </thead>
                            -->
                            <tbody>
                            <?php
                            /* @var $cart_model \app\model_extended\CART_MODEL */
                            $cart_items = isset($this->params['cart_items']) ? $this->params['cart_items'] : [];
                            $orderSubTotal = 0.0;

                            foreach ($cart_items as $key => $orderItems):
                                $itemTotal = (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                                $orderSubTotal = $orderSubTotal + (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?= "{$orderItems->QUANTITY}x {$orderItems->iTEMTYPE->mENUITEM->MENU_ITEM_NAME} ({$orderItems->iTEMTYPE->ITEM_TYPE_SIZE})"; ?></td>
                                    <td class="text-right"><?= $formatter->asCurrency($itemTotal) ?></td>
                                </tr>
                            <?php
                            endforeach;
                            $vat = 0;
                            $deliveryFee = 0;
                            $orderTotal = ($vat + $deliveryFee + $orderSubTotal);
                            ?>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line text-right"><strong>Order Sub Total</strong></td>
                                <td class="thick-line text-right">
                                    <strong><?= $formatter->asCurrency($orderSubTotal) ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line text-right"><strong>Including V.A.T</strong></td>
                                <td class="thick-line text-right">
                                    <strong><?= $formatter->asCurrency($vat) ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line text-right"><strong>Delivery Fee</strong></td>
                                <td class="thick-line text-right">
                                    <strong><?= $formatter->asCurrency($deliveryFee) ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line text-right"><strong>Order Total</strong></td>
                                <td class="thick-line text-right">
                                    <strong><?= $formatter->asCurrency($orderTotal) ?></strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <?= Html::a('PROCEED TO CHECKOUT', ['//customer/default/checkout'], ['class' => 'btn btn-success btn-lg btn-block']) ?>
                    </div>
                </section>
            </div>
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
