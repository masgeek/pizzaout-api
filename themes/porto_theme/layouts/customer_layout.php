<?php

/* @var $this View */

/* @var $content string */

use app\assetmanager\AppAsset;
use app\assetmanager\BowerAsset;
use app\assetmanager\FontAssets;
use app\assetmanager\PortoAssets;
use app\model_extended\CART_MODEL;
use app\widgets\Alert;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use kartik\editable\Editable;

AppAsset::register($this);
BowerAsset::register($this);
//\app\assetmanager\YarnAssets::register($this);
PortoAssets::register($this);
FontAssets::register($this);


//$this->params['breadcrumbs'][] = ['label' => 'Rider  Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
//$this->params['breadcrumbs'][] = $this->title;

$formatter = Yii::$app->formatter;
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
            <hr/>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <?= Alert::widget() ?>
                <!-- start: page -->
                <?= $content ?>
                <!-- end: page -->
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
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
                            <tbody>
                            <?php
                            /* @var $orderItems CART_MODEL */
                            $class = isset($this->params['class']) ? $this->params['class'] : 'btn-success btn-lg btn-block';
                            $cart_items = isset($this->params['cart_items']) ? $this->params['cart_items'] : [];
                            $checkout_url = isset($this->params['checkout_url']) ? $this->params['checkout_url'] : '//customer/default/checkout';
                            $orderSubTotal = 0.0;

                            foreach ($cart_items as $key => $orderItems):
                                $itemTotal = (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                                $orderSubTotal = $orderSubTotal + (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                                ?>
                                <tr>
                                    <td align="right">
                                        <?= Editable::widget([
                                            'model' => $orderItems,
                                            'attribute' => 'QUANTITY',
                                            'asPopover' => false,
                                            'submitOnEnter' => true,
                                            'editableValueOptions' => ['class' => 'text-danger'],
                                            'formOptions' => [
                                                'action' => ['//customer/default/change-quantity', 'id' => $orderItems->CART_ITEM_ID]
                                            ], 'options' => [
                                                'id' => "qty_$orderItems->CART_ITEM_ID",
                                                'format' => Editable::FORMAT_LINK,
                                                'inputType' => Editable::INPUT_SPIN,
                                            ]
                                        ]) ?>x
                                    </td>
                                    <td><?= "{$orderItems->iTEMTYPE->mENUITEM->MENU_ITEM_NAME} ({$orderItems->iTEMTYPE->ITEM_TYPE_SIZE})"; ?></td>
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

                        <?= Html::a(count($cart_items) > 0 ? 'PLACE ORDER' : 'ORDER IS EMPTY',
                            count($cart_items) > 0 ? [$checkout_url] : '#',
                            ['class' => count($cart_items) > 0 ? "btn {$class}" : 'btn btn-danger btn-md btn-block']) ?>
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
