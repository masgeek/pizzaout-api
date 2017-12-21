<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEM_TYPE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu--item--type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MENU_ITEM_ID')->dropDownList(\app\model_extended\MENU_ITEMS::GetMenuItems($model->mENUITEM->MENU_CAT_ID)) ?>

    <?= $form->field($model, 'ITEM_TYPE_SIZE')->dropDownList(\app\model_extended\MENU_ITEMS::GetItemSizes()) ?>

    <?= $form->field($model, 'PRICE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AVAILABLE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
