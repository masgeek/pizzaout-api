<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Nov-17
 * Time: 13:18
 */

/* @var $this yii\web\View */

/* @var $cart_items \app\model_extended\CART_MODEL */
/* @var $paymentModel \app\model_extended\CUSTOMER_PAYMENTS */
/* @var $form yii\widgets\ActiveForm */

/* @var $model \app\model_extended\CUSTOMER_ORDERS */

/* @var boolean $order_created */

/* @var string $paymentNumber */


use kartik\tabs\TabsX;

$vat = 0;
$deliveryFee = 0;
$orderTotal = 0;

$field_template_ = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span><i class="fa fa-money fa-2x"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

$field_template = <<<TEMPLATE
<label>{label}</label>
     {input} 
    {error}{hint}
TEMPLATE;
?>

<div class="col-lg-3 col-md-3">
    <section class="panel panel-default">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <!--<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>-->
            </div>
            <h2 class="panel-title"><?= $this->title ?></h2>
        </header>
        <div class="panel-body">
            <table data-height="auto" class="table table-condensed table-border">
                <tbody>
                <?php
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
    </section>
</div>

<div class="col-lg-9 col-md-9">
    <?php
    $items = [
        [
            'label' => '<i class="glyphicon glyphicon-phone"></i> Mobile Payment',
            'content' => $this->render('checkout-forms/_mobile-form', ['paymentModel' => $paymentModel, 'model' => $model, 'orderTotal' => $orderTotal, 'field_template' => $field_template]),
            'visible' => $order_created ? false : true, //visible if order has not been created
            'active' => $order_created ? false : true //active if order has not been created
        ],
        [
            'label' => '<i class="glyphicon glyphicon-file"></i> Payment Instructions',
            'content' => $this->render('checkout-forms/_instructions_form', ['model' => $model]),
            'visible' => $order_created ? true : false, //visible when the order has been created
            'active' => $order_created ? true : false, //active when the order has been created
        ],
        [
            'label' => '<i class="glyphicon glyphicon-credit-card"></i> Card Payment',
            'content' => $this->render('checkout-forms/_card-form', ['paymentModel' => $paymentModel, 'model' => $model, 'orderTotal' => $formatter->asCurrency($orderTotal)]),
            'visible' => false,
            // 'active' => true
        ],
    ];
    ?>
    <?=
    TabsX::widget([
        'items' => $items,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'bordered' => false,
    ]);
    ?>
</div>


