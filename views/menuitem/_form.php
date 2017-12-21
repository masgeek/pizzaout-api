<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEMS */
/* @var $form yii\widgets\ActiveForm */

$model->MENU_ITEM_IMAGE = '1.jpg';
?>

<div class="menu--items-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?= $form->field($model, 'MENU_CAT_ID')->dropDownList(\app\model_extended\MENU_CATEGORY::GetMenuCategories()) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MENU_ITEM_NAME')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MENU_ITEM_DESC')->textarea(['rows' => 6]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MENU_ITEM_IMAGE')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'HOT_DEAL')->checkbox() ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'VEGETARIAN')->checkbox() ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MAX_QTY')->textInput() ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
