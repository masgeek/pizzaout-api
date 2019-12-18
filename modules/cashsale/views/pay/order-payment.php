<?php


/* @var $this View */
/* @var $model Payment */

/* @var $orderModel CustomerOrder */

use app\models\CustomerOrder;
use app\models\CustomerOrderItem;
use app\models\Payment;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$vat = 0;
$deliveryFee = 0;
$orderTotal = 0;

$formatter = Yii::$app->formatter;


$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
</div>
    {error}{hint}
TEMPLATE;
?>

    <div class="row">
    <div class="col-md-3">
        <table class="table table-condensed table-hover table-border">
            <thead>
            <tr>
                <th colspan="2">Item</th>
                <th class="text-right">Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $orderSubTotal = 0.0;

            /* @var $orderItems CustomerOrderItem */
            foreach ($orderModel->customerOrderItems as $key => $orderItems):
                $itemTotal = (int)$orderItems->QUANTITY * (float)$orderItems->PRICE;
                $orderSubTotal = $orderSubTotal + (int)$orderItems->QUANTITY * (float)$orderItems->PRICE;
                ?>
                <tr>
                    <td></td>
                    <td><?= "{$orderItems->QUANTITY}x {$orderItems->iTEMTYPE->mENUITEM->MENU_ITEM_NAME} ({$orderItems->iTEMTYPE->ITEM_TYPE_SIZE})"; ?></td>
                    <td class="text-right"><?= $formatter->asCurrency($itemTotal) ?></td>
                </tr>
            <?php
            endforeach;
            $orderTotal = ($vat + $deliveryFee + $orderSubTotal);
            $orderModel->TOTAL_SALES = $formatter->asCurrency($orderTotal);
            ?>
            <tr>
                <td class="thick-line"></td>
                <td class="thick-line text-right"><strong>Sub Total</strong></td>
                <td class="thick-line text-right">
                    <strong><?= $formatter->asCurrency($orderSubTotal) ?></strong>
                </td>
            </tr>
            <tr>
                <td class="thick-line"></td>
                <td class="thick-line text-right"><strong>VAT</strong></td>
                <td class="thick-line text-right">
                    <strong><?= $formatter->asCurrency($vat) ?></strong>
                </td>
            </tr>
            <tr>
                <td class="thick-line"></td>
                <td class="thick-line text-right"><strong>Total</strong></td>
                <td class="thick-line text-right">
                    <strong><?= $formatter->asCurrency($orderTotal) ?></strong>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- now for the input form -->
    <div class="col-md-9">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->errorSummary($model) ?>

        <?= $form->field($model, 'PAYMENT_AMOUNT', ['template' => $field_template])->textInput([
            'value' => $orderTotal,
            'id' => 'payment_amount',
            'readonly' => true
        ]) ?>

        <?= $form->field($model, 'AMOUNT_RECEIVED', ['template' => $field_template])->textInput([
            'id' => 'amount_received'
        ]) ?>

        <?= $form->field($model, 'CHANGE_DUE', ['template' => $field_template])->textInput([
            'readonly' => true,
            'id' => 'change_due',
            'value' => 0
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Place Order', ['class' => 'btn btn-default btn-block btn-lg', 'id' => 'place-order', 'disabled' => true]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

<?php
$script = <<< JS
$("#amount_received").on("input", function(event){
      let amount_due = $("#payment_amount").val();
      let amount_received = $("#amount_received").val();
        
        $.ajax({
            url: 'pay/compute-sale',
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
                $("#change_due").val(data.change);
            },
            error:function() {
               $('#place-order').attr("disabled", true);
            }
        });
     });
JS;
$this->registerJs($script);