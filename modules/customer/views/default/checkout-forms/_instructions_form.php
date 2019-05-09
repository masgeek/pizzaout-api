<?php
/* @var $this yii\web\View */
/* @var $model \app\model_extended\CUSTOMER_ORDERS */


$payments = \app\helpers\ORDER_HELPER::getPaymentUssd();

$paymentNumber = \Yii::$app->params['ussdNumber'] . "{$model->ComputeOrderTotal()}#";
?>
<div class="container">
    <h1>Payment for Order No #<?= $model->ORDER_ID ?></h1>
    <p>Payment instructions for your order:</p>

    <?php foreach ($payments as $key => $payment): ?>
        <li class="list-group-item">
            <h3>For <?= $payment['provider'] ?></h3>
            <h4>Kindly dial this number <strong><?= $payment['ussd'] . "{$model->ComputeOrderTotal()}#" ?></strong> on the phone you are using to pay.</h4>
        </li>
    <?php endforeach; ?>

        <p>The the order amount of <strong><?= $model->ComputeOrderTotal(true) ?></strong> will be  automatically charged</p>
        <footer>
            In case of any difficulties contact customer support on <strong
                    class="text text-info"><?= \Yii::$app->params['helpLine'] ?></strong> and quote your order number #
            <strong><?= $model->ORDER_ID ?></strong>
        </footer>
</div>




