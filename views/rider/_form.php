<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rider--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KITCHEN_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIDER_STATUS')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
