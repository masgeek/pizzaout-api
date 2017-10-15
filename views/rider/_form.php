<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rider--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RIDER_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIDER_MOBILE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIDER_STATUS')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
