<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEM_TYPE */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-cog"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;
?>

<div class="menu--item--type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MENU_ITEM_ID', ['template' => $field_template])->dropDownList(\app\model_extended\MENU_ITEMS::GetMenuItems(null)) ?>

    <?= $form->field($model, 'ITEM_TYPE_SIZE', ['template' => $field_template])->dropDownList(\app\model_extended\MENU_ITEMS::GetItemSizes()) ?>

    <?= $form->field($model, 'PRICE', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AVAILABLE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
