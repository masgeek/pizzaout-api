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

$future = \app\helpers\APP_UTILS::GetFutureDateTime('yyyy-MM-dd', 2, 'D');

$model->PAYMENT_METHOD = \app\helpers\APP_UTILS::PAYMENT_METHOD_MOBILE;
$paymentModel->PAYMENT_CHANNEL = \app\helpers\APP_UTILS::PAYMENT_METHOD_MOBILE;
$paymentModel->PAYMENT_NUMBER = Yii::$app->user->identity->mobile;

if ($model->isNewRecord) {
    $model->ORDER_DATE = date('Y-m-d'); //default to current date if it is a new record
}
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'USER_ID')->hiddenInput()->label(false) ?>

<?= $form->field($model, 'PAYMENT_METHOD')->hiddenInput(['readonly' => true])->label(false) ?>


<?= $form->field($model, 'ORDER_TIME', ['template' => $field_template])->dropDownList(\app\models\DeliveryTime::GetDeliveryTime(), [
    'class' => 'form-control input-lg',
    'prompt' => 'Please select delivery time'
]) ?>

<?= $form->field($model, 'LOCATION_ID', ['template' => $field_template])->dropDownList(\app\model_extended\LOCATION_MODEL::GetActiveLocation(), [
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

<?= $form->field($model, 'NOTES', ['template' => $field_template])->textInput(['class' => 'form-control input-lg']) ?>

<?= $form->field($paymentModel, 'PAYMENT_NUMBER', ['template' => $field_template])->textInput([
    'class' => 'form-control input-lg'
]) ?>

<?= $form->field($paymentModel, 'PAYMENT_AMOUNT')->hiddenInput(['value' => $orderTotal, 'readonly' => true])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Place Order', ['class' => 'btn btn-success btn-block btn-lg']) ?>
</div>

<?php ActiveForm::end(); ?>

