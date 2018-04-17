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

phpinfo();
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

    <?php if ($context === \app\model_extended\ReportModel::CONTEXT_GENERAL): ?>

    <?php elseif ($context === \app\model_extended\ReportModel::CONTEXT_SALES): ?>

    <?php elseif ($context === \app\model_extended\ReportModel::CONTEXT_LOCATION): ?>
        <?= $form->field($model, 'LOCATION_ID', ['template' => $field_template])->dropDownList(\app\model_extended\LOCATION_MODEL::GetAllLocations(), [
                'prompt' => '--- ALL LOCATIONS ---',
                'class' => 'form-control'
            ]
        ) ?>
    <?php elseif ($context === \app\model_extended\ReportModel::CONTEXT_RIDER): ?>
        <?= $form->field($model, 'RIDER_ID', ['template' => $field_template])->dropDownList(\app\model_extended\RIDER_MODEL::GetAllRiders(), [
                'prompt' => '--- ALL RIDERS ---',
                'class' => 'form-control'
            ]
        ) ?>
    <?php elseif ($context === \app\model_extended\ReportModel::CONTEXT_CHEF): ?>
        <?= $form->field($model, 'CHEF_ID', ['template' => $field_template])->dropDownList(\app\model_extended\CHEF_MODEL::GetAllChefs(), [
                'prompt' => '--- ALL CHEFS ---',
                'class' => 'form-control',
            ]
        ) ?>
    <?php elseif ($context == \app\model_extended\ReportModel::CONTEXT_KITCHEN): ?>
        <?= $form->field($model, 'KITCHEN_ID', ['template' => $field_template])->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), [
                'prompt' => '--- ALL KITCHENS ---',
                'class' => 'form-control',
            ]
        ) ?>
    <?php endif; ?>





    <?php // echo $form->field($model, 'PAYMENT_METHOD') ?>

    <?php // echo $form->field($model, 'ORDER_STATUS') ?>

    <?php // echo $form->field($model, 'ORDER_TIME') ?>

    <?php // echo $form->field($model, 'NOTES') ?>

    <?php // echo $form->field($model, 'CREATED_AT') ?>

    <?php // echo $form->field($model, 'UPDATED_AT') ?>

    <?php // echo $form->field($model, 'USER_ID') ?>

    <?php // echo $form->field($model, 'USER_NAME') ?>

    <?php // echo $form->field($model, 'USER_TYPE') ?>

    <?php // echo $form->field($model, 'SURNAME') ?>

    <?php // echo $form->field($model, 'OTHER_NAMES') ?>

    <?php // echo $form->field($model, 'QUANTITY') ?>

    <?php // echo $form->field($model, 'PRICE') ?>

    <?php // echo $form->field($model, 'SUBTOTAL') ?>

    <?php // echo $form->field($model, 'MENU_PRICE') ?>

    <?php // echo $form->field($model, 'MENU_ITEM_NAME') ?>

    <?php // echo $form->field($model, 'MENU_CAT_NAME') ?>

    <?php // echo $form->field($model, 'LOCATION_NAME') ?>

    <?php // echo $form->field($model, 'COUNTRY_ID') ?>

    <?php // echo $form->field($model, 'CHEF_NAME') ?>

    <div class="form-group">

        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default btn-block hidden']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
