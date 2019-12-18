<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */
/* @var $scope array */
/* @var $workflow int */

?>
<div class="customer-orders-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
        <?= $form->field($model, 'ORDER_STATUS')->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus($model->ORDER_ID, $scope, $workflow), [
            'prompt' => '--- SELECT STATUS ---',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="col-md-12">
        <?= Html::submitButton('Confirm order', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
