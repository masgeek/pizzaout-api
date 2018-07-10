<?php
/* @var $this yii\web\View */
/* @var $model \app\model_extended\CUSTOMER_ORDERS */


$paymentNumber = \Yii::$app->params['ussdNumber'] . "{$model->ComputeOrderTotal()}#";
?>

<div class="container">
    <h1>Payment for Order No #<?= $model->ORDER_ID ?></h1>
    <p>Payment instructions for your order:</p>
    <blockquote>
        <p>
            Kindly dial this number <strong><?= $paymentNumber ?></strong> on the phone you are using to pay.
        </p>
        <p>
            The the order amount of <strong><?= $model->ComputeOrderTotal(true) ?></strong> will be
            automatically charged
        </p>
        <footer>
            In case of any difficulties contact customer support on <strong
                    class="text text-info"><?= \Yii::$app->params['helpLine'] ?></strong> and quote your order number #
            <strong><?= $model->ORDER_ID ?></strong>
        </footer>
    </blockquote>
</div>




