<?php
/* @var $this yii\web\View */

/* @var $cart_items \app\model_extended\CART_MODEL */
/* @var $paymentModel \app\model_extended\CUSTOMER_PAYMENTS */
/* @var $form yii\widgets\ActiveForm */

/* @var $model \app\model_extended\CUSTOMER_ORDERS */

/* @var float $orderTotal */


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$model->PAYMENT_METHOD = \app\helpers\APP_UTILS::PAYMENT_METHOD_CARD;
$paymentModel->PAYMENT_CHANNEL = \app\helpers\APP_UTILS::PAYMENT_METHOD_CARD;
$paymentModel->PAYMENT_NUMBER = 'N/A';
?>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <?= Html::img('@web/images/credit_cards/master_card_large.png', ['alt' => 'Master Card Payment', 'class' => 'img img-thumbnail']); ?>
    </div>
    <div class="col-md-6 cl-sm-12">
        <?= Html::img('@web/images/credit_cards/visa_card_large.png', ['alt' => 'Visa Card Payment', 'class' => 'img img-thumbnail']); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'USER_ID')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'PAYMENT_METHOD')->hiddenInput(['readonly' => true])->label(false) ?>

        <?= $form->field($paymentModel, 'PAYMENT_AMOUNT')->hiddenInput(['value' => $orderTotal, 'readonly' => true])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Place Order', ['class' => 'btn btn-primary btn-block btn-lg', 'id'=>'card-checkout']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

