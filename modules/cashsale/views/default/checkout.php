<?php
/* @var $this yii\web\View */

/* @var $cart_items CART_MODEL */
/* @var $paymentModel CUSTOMER_PAYMENTS */
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

$model->PAYMENT_METHOD = APP_UTILS::PAYMENT_METHOD_CASH;
$paymentModel->PAYMENT_CHANNEL = APP_UTILS::PAYMENT_METHOD_CASH;
$paymentModel->PAYMENT_NUMBER = Yii::$app->user->identity->mobile;
$model->NOTES = "Cash sale";
$vat = 0;
$deliveryFee = 0;
$orderTotal = 0;

$field_template = <<<TEMPLATE
<label>{label}</label>
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

        <?= $form->field($model, 'USER_ID')->hiddenInput()->label(false) ?>
        <?= $form->field($paymentModel, 'PAYMENT_NUMBER')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'PAYMENT_METHOD')->hiddenInput(['readonly' => true])->label(false) ?>
        <?= $form->field($paymentModel, 'PAYMENT_AMOUNT')->hiddenInput(['value' => $orderTotal, 'id' => 'payment_amount'])->label(false) ?>


        <?= $form->field($model, 'ORDER_TIME')->dropDownList(DeliveryTime::GetDeliveryTime(true), [
            'class' => 'form-control input-lg hidden',
            'prompt' => 'Please select delivery time'
        ])->label(false) ?>

        <?= $form->field($model, 'LOCATION_ID', ['template' => $field_template])->dropDownList(LOCATION_MODEL::GetActiveLocation(), [
            'class' => 'form-control input-lg',
            'prompt' => 'Please select delivery location'
        ]) ?>


        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'ORDER_DATE',
            'removeButton' => false,
            'options' => [
                'class' => 'form-control input-lg',
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
        <?= $form->field($model, 'KITCHEN_ID', ['template' => $field_template])->dropDownList(KITCHEN_MODEL::GetKitchens(), [
                'prompt' => '--- SELECT KITCHEN ---',
                'class' => 'form-control',
                'id' => 'kitchen'
            ]
        ) ?>

        <?=
        $form->field($model, 'CHEF_ID')->widget(DepDrop::classname(), [
            'options' => ['id' => 'chef-id'],
            'pluginOptions' => [
                'depends' => ['kitchen'],
                'placeholder' => '--- SELECT CHEF ---',
                'url' => Url::to(['//chef/chef-list'])
            ]
        ]); ?>
        <?= $form->field($model, 'NOTES', ['template' => $field_template])->textInput(['class' => 'form-control input-lg']) ?>
        <?= $form->field($model, 'TOTAL_SALES', ['template' => $field_template])->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'AMOUNT_RECEIVED', ['template' => $field_template])
            ->textInput() ?>
        <?= $form->field($model, 'CHANGE_DUE', ['template' => $field_template])->textInput(['readonly' => true, 'value' => 0]) ?>

        <div class="form-group">
            <?= Html::submitButton('Place Order', ['class' => 'btn btn-default btn-block btn-lg', 'id' => 'place-order', 'disabled' => true]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$script = <<< JS
$("#customer_orders-amount_received").on("input", function(event){
      let amount_due = $("#payment_amount").val();
      let amount_received = $("#customer_orders-amount_received").val();
        
        $.ajax({
            url: 'compute-sale',
            method:'POST',
            dataType: 'json',
            data: { amountDue: amount_due, amountReceived: amount_received },
            success: function(data) {
                if(data.proceed){
                    //enable place order button
                      $('#place-order').attr("disabled", false);
                      $("#place-order").addClass('btn-success').removeClass('btn-default');
                }else{
                    $('#place-order').attr("disabled", true);
                  $("#place-order").addClass('btn-default').removeClass('btn-success');
                }
                $("#customer_orders-change_due").val(data.change); 
            }
        });
     });
JS;
$this->registerJs($script);
