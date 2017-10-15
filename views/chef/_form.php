<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CHEF_MODEL */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chef--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CHEF_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KITCHEN_ID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
