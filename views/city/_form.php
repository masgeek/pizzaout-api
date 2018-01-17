<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CITY_MODEL */
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

<div class="city--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CITY_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COUNTRY_ID', ['template' => $field_template])->dropDownList(\app\model_extended\COUNTRY_MODEL::GetCountry(), ['prompt' => 'Select Country']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
