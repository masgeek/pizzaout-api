<?php
/* @var $this yii\web\View */

/* @var $cart_items \app\model_extended\CART_MODEL */
/* @var $paymentModel \app\model_extended\CUSTOMER_PAYMENTS */
/* @var $form yii\widgets\ActiveForm */

/* @var $model \app\model_extended\CUSTOMER_ORDERS */

/* @var float $orderTotal */

/* @var array $field_template */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$model->PAYMENT_METHOD = \app\helpers\APP_UTILS::PAYMENT_METHOD_MOBILE;
$paymentModel->PAYMENT_CHANNEL = \app\helpers\APP_UTILS::PAYMENT_METHOD_MOBILE;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'USER_ID')->hiddenInput()->label(false) ?>

<div class="row">
    <?= $form->field($model, 'PAYMENT_METHOD')->hiddenInput(['readonly' => true])->label(false) ?>
</div>

<?= $form->field($model, 'NOTES', ['template' => $field_template])->textInput(['class' => 'form-control input-lg']) ?>

<?= $form->field($paymentModel, 'PAYMENT_NUMBER', ['template' => $field_template])->textInput(['class' => 'form-control input-lg']) ?>

<?= $form->field($paymentModel, 'PAYMENT_AMOUNT')->hiddenInput(['value' => $orderTotal, 'readonly' => true])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Place Order', ['class' => 'btn btn-success btn-block btn-lg']) ?>
</div>

<?php ActiveForm::end(); ?>

