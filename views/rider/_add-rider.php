<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */
/* @var $userModel app\model_extended\USERS_MODEL */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rider-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?= $form->field($userModel, 'USER_NAME')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <?= $form->field($userModel, 'USER_TYPE')->hiddenInput(['maxlength' => true])->label(false) ?>
    </div>

    <div class="row">
        <?= $form->field($userModel, 'SURNAME')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($userModel, 'OTHER_NAMES')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($userModel, 'MOBILE')->textInput() ?>
    </div>
    <div class="row">
        <?= $form->field($userModel, 'EMAIL')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($userModel, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'KITCHEN_ID')->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), ['prompt' => Yii::t('app', 'Select Kitchen')]) ?>

    <?= $form->field($model, 'RIDER_STATUS')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($userModel->isNewRecord ? Yii::t('app', 'Create Rider') : Yii::t('app', 'Update Rider'), ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

