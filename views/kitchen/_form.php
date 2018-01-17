<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\KITCHEN_MODEL */
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

<div class="kitchen--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KITCHEN_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CITY_ID', ['template' => $field_template])->dropDownList(\app\model_extended\CITY_MODEL::GetCity(), ['prompt' => '---SELECT CITY---']) ?>

    <?= $form->field($model, 'OPENING_TIME', ['template' => $field_template])->textInput() ?>

    <?= $form->field($model, 'CLOSING_TIME', ['template' => $field_template])->textInput() ?>

    <?= $form->field($model, 'ADDRESS', ['template' => $field_template])->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-default btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
