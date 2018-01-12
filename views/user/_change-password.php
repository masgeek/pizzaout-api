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
        <div class="col-md-6">
            <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'CONFIRM_PASSWORD')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update Password'), ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div
    <?php ActiveForm::end(); ?>
</div>
