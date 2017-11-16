<?php
/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
$formatter = \Yii::$app->formatter;
?>


<table class="table table-striped table-hover table-border">
    <thead>
    <tr>
        <th>Order No</th>
        <th>Payment Ref</th>
        <th>Payment Number</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Status</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>


    <?php
    foreach ($model->payments as $payment):?>
        <tr>
            <td><?= $payment->ORDER_ID ?></td>
            <td><?= $payment->PAYMENT_REF ?></td>
            <td><?= $payment->PAYMENT_NUMBER != null ? $payment->PAYMENT_NUMBER : 'N/A' ?></td>
            <td><?= $formatter->asCurrency($payment->PAYMENT_AMOUNT) ?></td>
            <td><?= $formatter->asDatetime($payment->PAYMENT_DATE) ?></td>
            <td><?= "<span class='badge' style='background-color: {$payment->pAYMENTSTATUS->COLOR};'> </span>  <code>" . $payment->PAYMENT_STATUS . '</code>' ?></td>
            <td><?= $payment->PAYMENT_NOTES != null ? $payment->PAYMENT_NOTES : 'N/A' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
<style>
    table.GeneratedTable thead {
        background-color: #adb37c;
        color: #fefeff;
    }
</style>

