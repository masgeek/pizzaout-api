<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\ReportModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ORDER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCATION_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KITCHEN_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CHEF_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIDER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORDER_DATE')->textInput() ?>

    <?= $form->field($model, 'PAYMENT_METHOD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORDER_STATUS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORDER_TIME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOTES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATED_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATED_AT')->textInput() ?>

    <?= $form->field($model, 'USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USER_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USER_TYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SURNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OTHER_NAMES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'QUANTITY')->textInput() ?>

    <?= $form->field($model, 'PRICE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SUBTOTAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MENU_PRICE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MENU_ITEM_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MENU_CAT_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCATION_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COUNTRY_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CHEF_NAME')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
