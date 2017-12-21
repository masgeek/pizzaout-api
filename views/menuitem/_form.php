<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEMS */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-user"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

$model->MENU_ITEM_IMAGE = '1.jpg';
?>

<div class="menu--items-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?= $form->field($model, 'MENU_CAT_ID',['template' => $field_template])->dropDownList(\app\model_extended\MENU_CATEGORY::GetMenuCategories()) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MENU_ITEM_NAME',['template' => $field_template])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MENU_ITEM_DESC',['template' => $field_template])->textarea(['rows' => 6]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MENU_ITEM_IMAGE')->hiddenInput(['maxlength' => true])->label(false) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'HOT_DEAL')->checkbox() ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'VEGETARIAN')->checkbox() ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MAX_QTY',['template' => $field_template])->textInput() ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
