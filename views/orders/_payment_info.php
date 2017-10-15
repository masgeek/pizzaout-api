<?php
/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
?>


<table class="table table-striped table-hover table-bordered GeneratedTable">
    <thead>
    <tr>
        <th>Order No</th>
        <th>Payment Ref</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>


	<?php
	foreach ($model->payments as $payment):?>
        <tr>
            <td><?= $payment->ORDER_ID ?></td>
            <td><?= $payment->PAYMENT_REF ?></td>
            <td><?= $payment->PAYMENT_AMOUNT ?></td>
            <td><?= $payment->PAYMENT_DATE ?></td>
            <td><?= $payment->PAYMENT_STATUS ?></td>
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

