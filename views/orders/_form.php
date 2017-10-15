<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer--orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCATION_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CHEF_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIDER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORDER_QUANTITY')->textInput() ?>

    <?= $form->field($model, 'ORDER_DATE')->textInput() ?>

    <?= $form->field($model, 'ORDER_PRICE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAYMENT_METHOD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORDER_STATUS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOTES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATED_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATED_AT')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
