<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models_search\ReportSearch */
/* @var $context */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label><h5>{label}</h5></label>
<div class="input-group input-group-icon">
     {input} 
    <!--<span class="input-group-addon">
        <span class="icon"><i class="fa fa-cog"></i></span>
    </span>-->
</div>
    {error}{hint}
TEMPLATE;
?>

<div class="report-model-search">

    <?php $form = ActiveForm::begin([
        //'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ORDER_DATE', [
        'addon' => ['append' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>']],
        'options' => ['class' => 'drp-container form-group']
    ])->widget(\kartik\daterange\DateRangePicker::className(), [
        'useWithAddon' => true,
        'convertFormat' => true,
        'startAttribute' => 'START_DATE',
        'endAttribute' => 'END_DATE',
        'pluginOptions' => [
            //'timePicker' => true,
            //'timePickerIncrement' => 15,
            'locale' => [
                //'format' => 'Y-m-d h:i A',
                'format' => 'Y-m-d',
                'separator' => ' TO '
            ],
        ],
    ])->hint('Orders Date range period'); ?>


    <?= $form->field($model, 'CHEF_ID', ['template' => $field_template])->dropDownList(\app\model_extended\CHEF_MODEL::GetAllChefs(), [
            'prompt' => '--- ALL CHEFS ---',
            'class' => 'form-control',
        ]
    ) ?>

    <?= $form->field($model, 'MENU_ITEM_NAME')->dropDownList(\app\model_extended\MENU_ITEMS::GetMenuItems()) ?>

    <?= $form->field($model, 'MENU_CAT_NAME')->dropDownList(\app\model_extended\MENU_CATEGORY::GetMenuCategories()) ?>

    <?= $form->field($model, 'ITEM_TYPE_SIZE')->dropDownList(\app\model_extended\MENU_ITEM_TYPE::getMenuItems()) ?>



    <?php // echo $form->field($model, 'MENU_ITEM_ID') ?>

    <?php // echo $form->field($model, 'MENU_CAT_ID') ?>

    <?php // echo $form->field($model, 'ITEM_TYPE_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

