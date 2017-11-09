<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\USERS_MODEL */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-model-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <?= $form->field($model, 'USER_NAME')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'USER_TYPE')->hiddenInput(['maxlength' => true])->label(false) ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'SURNAME')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'OTHER_NAMES')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MOBILE')->textInput() ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'LOCATION_ID')->hiddenInput(['maxlength' => true])->label(false) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Sign Up' : 'Update Profile', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
