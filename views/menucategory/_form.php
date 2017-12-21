<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_CATEGORY */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu--category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MENU_CAT_NAME')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'MENU_CAT_IMAGE')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'ACTIVE')->textInput() ?-->

    <?= $form->field($model, 'ACTIVE')->dropDownList([1 => 'Active', 0 => 'Inactive']) ?>

    <?= $form->field($model, 'RANK')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
