<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\USERS_MODEL */
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

?>

<div class="users-model-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php if ($model->isNewRecord): ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'USER_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'PASSWORD', ['template' => $field_template])->passwordInput(['maxlength' => true]) ?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <?= $form->field($model, 'USER_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <?= $form->field($model, 'SURNAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'OTHER_NAMES', ['template' => $field_template])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'MOBILE', ['template' => $field_template])->textInput() ?>
    </div>
    <div class="row">
        <?= $form->field($model, 'EMAIL', ['template' => $field_template])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row hidden">
        <?= $form->field($model, 'USER_TYPE', ['template' => $field_template])->dropDownList(\app\model_extended\USER_TYPE_MODEL::GetUserTypes()) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Sign Up' : 'Update Profile', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

