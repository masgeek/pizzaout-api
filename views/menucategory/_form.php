<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_CATEGORY */
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

<div class="menu--category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MENU_CAT_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'MENU_CAT_IMAGE')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'ACTIVE')->textInput() ?-->

    <?= $form->field($model, 'ACTIVE', ['template' => $field_template])->dropDownList([1 => 'Active', 0 => 'Inactive']) ?>

    <?= $form->field($model, 'RANK', ['template' => $field_template])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
