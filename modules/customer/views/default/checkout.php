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

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$vat = 0;
$deliveryFee = 0;
$orderTotal = 0;
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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->hiddenInput()->label(false) ?>


    <?= $form->field($model, 'PAYMENT_METHOD')->textInput(['readonly' => true]) ?>


    <?= $form->field($model, 'NOTES')->textInput(['maxlength' => true]) ?>
    <?= $form->field($paymentModel, 'PAYMENT_NUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($paymentModel, 'PAYMENT_AMOUNT')->textInput(['value' => $orderTotal, 'readonly' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Place Order', ['class' => 'btn btn-success btn-block btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>


