<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */
/* @var $scope array */
/* @var $workflow int */

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

$checkboxTemplate = '<div class="checkbox i-checks">{input}{error}{hint}</div>';
?>
<div class="customer-orders-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php if ($model->KITCHEN_ID == null || $model->CHEF_ID == null): ?>
        <div class="col-md-12">
            <?= $form->field($model, 'KITCHEN_ID', ['template' => $field_template])->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), [
                    'prompt' => '--- SELECT KITCHEN ---',
                    'class' => 'form-control',
                    'id' => 'kitchen'
                ]
            ) ?>
        </div>
        <div class="col-md-12">
            <?=
            $form->field($model, 'CHEF_ID')->widget(DepDrop::classname(), [
                'options' => ['id' => 'chef-id'],
                'pluginOptions' => [
                    'depends' => ['kitchen'],
                    'placeholder' => '--- SELECT CHEF ---',
                    'url' => Url::to(['chef/chef-list'])
                ]
            ]); ?>'

        </div>


    <?php endif; ?>

    <?php if ($model->scenario == \app\helpers\APP_UTILS::SCENARIO_ASSIGN_RIDER || $model->scenario == \app\helpers\APP_UTILS::SCENARIO_PREPARE_ORDER): ?>
        <div class="col-md-12">
            <?=
            $form->field($model, 'RIDER_ID', ['template' => $field_template])->widget(DepDrop::classname(), [
                'options' => [
                    'id' => 'rider',
                ],
                'data' => \app\model_extended\RIDER_MODEL::GetRiders($model->KITCHEN_ID),
                'pluginOptions' => [
                    'depends' => ['kitchen'],
                    'initialize' => true,
                    'placeholder' => '--- SELECT RIDER ---',
                    'url' => Url::to(['rider/get-rider'])
                ]
            ]); ?>'

            <!--?= $form->field($model, 'RIDER_ID', ['template' => $field_template])->dropDownList(\app\model_extended\RIDER_MODEL::GetRiders($model->KITCHEN_ID), [
                    'prompt' => '--- SELECT RIDER ---',
                ]
            ) ?-->
        </div>
    <?php endif; ?>

    <div class="col-md-12">
        <?= $form->field($model, 'ORDER_STATUS', ['template' => $field_template])->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus($model->ORDER_ID, $scope, $workflow), [
            'prompt' => '--- SELECT STATUS ---',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'ALERT_USER')->checkbox(); ?>
    </div>



    <div class="col-md-12">
        <?= $form->field($model, 'COMMENTS', ['template' => $field_template])->textarea([
            'cols' => 4,
            'rows' => 4,
            'placeholder' => 'Comments'
        ])->label(false) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Process Order', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <!--
    <div class="row">
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon beautiful">
                        <input type="checkbox">
                    </span>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon beautiful">
                        <input type="radio">
                    </span>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>

    </div>
    -->
    <?php ActiveForm::end(); ?>
</div>
