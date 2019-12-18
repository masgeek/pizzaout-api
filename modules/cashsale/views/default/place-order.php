<?php
/* @var $this yii\web\View */

/* @var $cart_items CART_MODEL */
/* @var $form yii\widgets\ActiveForm */

/* @var $model CUSTOMER_ORDERS */

/* @var float $orderTotal */

use app\helpers\APP_UTILS;
use app\model_extended\CART_MODEL;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\CUSTOMER_PAYMENTS;
use app\model_extended\KITCHEN_MODEL;
use app\model_extended\LOCATION_MODEL;
use app\models\DeliveryTime;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$future = APP_UTILS::GetFutureDateTime('yyyy-MM-dd', 0, 'D');

$vat = 0;
$deliveryFee = 0;
$orderTotal = 0;

$field_template = <<<TEMPLATE
<label style="margin-top: 15px;">{label}</label>
<div class="input-group input-group-icon">
     {input} 
</div>
    {error}{hint}
TEMPLATE;
$checkboxTemplate = '<div class="checkbox i-checks">{input}{error}{hint}</div>';

$model->ORDER_TIME = date('H:00');
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
                $model->TOTAL_SALES = $formatter->asCurrency($orderTotal);
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

<div class="col-md-9">
    <?php

    if ($model->isNewRecord) {
        $model->ORDER_DATE = date('Y-m-d'); //default to current date if it is a new record
    }
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'ORDER_DATE',
        'removeButton' => false,
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'Enter delivery date...'
        ],
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'startDate' => date('Y-m-d'), //min date is today
            'endDate' => $future, //prevent selection past defined duration
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'TABLE_NUMBER', ['template' => $field_template])->textInput(['class' => 'form-control']) ?>

    <?= $form->field($model, 'NOTES', ['template' => $field_template])->textInput(['class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Place Order', ['class' => 'btn btn-primary btn-block btn-lg', 'id' => 'place-order']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
