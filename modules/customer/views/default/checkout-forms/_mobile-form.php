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
use kartik\widgets\DatePicker;
use yii\helpers\Url;

$model->PAYMENT_METHOD = \app\helpers\APP_UTILS::PAYMENT_METHOD_MOBILE;
$paymentModel->PAYMENT_CHANNEL = \app\helpers\APP_UTILS::PAYMENT_METHOD_MOBILE;
$paymentModel->PAYMENT_NUMBER = Yii::$app->user->identity->mobile;

if ($model->isNewRecord) {
    $model->ORDER_DATE = date('Y-m-d'); //default to current date
}
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'USER_ID')->hiddenInput()->label(false) ?>

<div class="row">
    <?= $form->field($model, 'PAYMENT_METHOD')->hiddenInput(['readonly' => true])->label(false) ?>
</div>

<?= $form->field($model, 'LOCATION_ID', ['template' => $field_template])->textInput(['class' => 'form-control input-lg']) ?>

<?= $form->field($model, 'ORDER_TIME', ['template' => $field_template])->dropDownList([], ['class' => 'form-control input-lg']) ?>

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
        'startDate'=>date('Y-m-d'),
        'endDate'=>date('Y-m-d'),
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]); ?>

<?= $form->field($model, 'NOTES', ['template' => $field_template])->textInput(['class' => 'form-control input-lg']) ?>

<?= $form->field($paymentModel, 'PAYMENT_NUMBER', ['template' => $field_template])->textInput([
    'class' => 'form-control input-lg'
]) ?>

<?= $form->field($paymentModel, 'PAYMENT_AMOUNT')->hiddenInput(['value' => $orderTotal, 'readonly' => true])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Place Order', ['class' => 'btn btn-success btn-block btn-lg']) ?>
</div>

<?php ActiveForm::end(); ?>

