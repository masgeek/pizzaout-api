<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use limion\jqueryfileupload\JQueryFileUpload;

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

    <div class="row">
        <?= $form->field($model, 'MENU_CAT_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>
    </div>
    <!--?= $form->field($model, 'MENU_CAT_IMAGE')->textInput(['maxlength' => true]) ?-->


    <div class="row">
        <?= $form->field($model, 'MENU_CAT_IMAGE', ['template' => $field_template])->hiddenInput(['id' => 'filename', 'maxlength' => true])->label(false) ?>

        <?= JQueryFileUpload::widget([
            'model' => $model,
            'attribute' => 'IMAGE_FILE',
            'url' => ['//upload/index', 'rank' => 'category'], // your route for saving images,
            'appearance' => 'ui', // available values: 'ui','plus' or 'basic'
            'gallery' => false, // whether to use the Bluimp Gallery on the images or not
            'formId' => $form->id,
            'options' => [
                'multiple' => false,
                'accept' => 'image/*'
            ],
            'clientOptions' => [
                'multiple' => false,
                'maxFileSize' => 2000000,
                'dataType' => 'json',
                'acceptFileTypes' => new yii\web\JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                'autoUpload' => false
            ], 'clientEvents' => [
                'done' => "function (e, data) {
                $.each(data.result.files, function (index, file) {
                    ///$('<p/>').text(file.name).appendTo('#sam');
                   $('#filename').val(file.name);
                });
            }"
            ]
        ]); ?>

    </div>
    <div class="row">
        <?= $form->field($model, 'ACTIVE', ['template' => $field_template])->dropDownList([1 => 'Active', 0 => 'Inactive']) ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'RANK', ['template' => $field_template])->textInput() ?>
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block btn-lg']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
