<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\STATUS_MODEL */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-adjust"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;


$scopeArr = [
    'INACTIVE' => 'Deactivate',
    'OFFICE' => 'Office',
    'ALL' => 'All Levels',
    'RIDER' => 'Rider',
    'KITCHEN' => 'Kitchen',
];

asort($scopeArr);
?>

<div class="status--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'STATUS_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS_DESC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COLOR')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'SCOPE')->textInput(['maxlength' => true]) ?-->
    <?= $form->field($model, 'SCOPE')->dropDownList($scopeArr) ?>

    <?= $form->field($model, 'RANK')->textInput() ?>

    <?= $form->field($model, 'WORKFLOW')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
