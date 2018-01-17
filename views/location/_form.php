<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\LOCATION_MODEL */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label><h5>{label}</h5></label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon"><i class="fa fa-cog"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

?>

<div class="location--model-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'CITY_ID', ['template' => $field_template])->dropDownList(\app\model_extended\CITY_MODEL::GetCity(), ['prompt' => 'Select City']) ?>

    <?= $form->field($model, 'LOCATION_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ADDRESS', ['template' => $field_template])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ACTIVE')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
