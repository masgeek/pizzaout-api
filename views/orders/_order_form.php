<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */

$attributes = [
	[
		'group' => true,
		'label' => 'Order Details',
		'rowOptions' => ['class' => 'success']
	],
	[
		'columns' => [
			[
				'attribute' => 'ORDER_ID',
				//'label'=>'Book #',
				'displayOnly' => true,
				'valueColOptions' => ['style' => 'width:30%']
			],
			[
				'attribute' => 'ORDER_PRICE',
				//'label'=>'Buy Amount ($)',
				'displayOnly' => true,
				'format' => ['decimal', 2],
				'inputContainer' => ['class' => 'col-sm-6'],
			],

		],
	],
	[
		'columns' => [
			[
				'attribute' => 'LOCATION_ID',
				'value' => "{$model->lOCATION->LOCATION_NAME}",
			],
			[
				'attribute' => 'ORDER_STATUS',
				'format' => 'raw',
				'value' => "<span class='badge' style='background-color: {$model->oRDERSTATUS->COLOR};'> </span>  <code>" . $model->ORDER_STATUS . '</code>',
				'type' => DetailView::INPUT_COLOR,
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'ORDER_QUANTITY',
			],
			[
				'attribute' => 'ORDER_DATE',
				'format' => 'datetime',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'RIDER_ID',
			],
			[
				'attribute' => 'CHEF_ID',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'PAYMENT_METHOD',
			],
			[
				'attribute' => 'NOTES',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],

];

?>

<div class="customer-orders-view">
	<?= DetailView::widget([
		'model' => $model,
		'attributes' => $attributes,
	]) ?>
</div>

<div id="staus-history">
	<?= $this->render('_status_history', [
		'model' => $model,
	]) ?>
</div>

<div class="customer-orders-form">
	<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
			<?= $form->field($model, 'ORDER_STATUS')->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus(), ['prompt' => '--- SELECT STATUS ---']) ?>
        </div>
        <div class="col-md-6">
			<?= $form->field($tracker, 'COMMENTS')->textarea(['cols' => 4, 'rows' => 2]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
			<?= $form->field($model, 'CHEF_ID')->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), [
					'prompt' => '--- SELECT KITCHEN ---',
					'id' => 'chef-kitchen',
                    'enabled'=>false
				]
			) ?>
        </div>
        <!--<div class="col-md-6">
			<?= $form->field($model, 'CHEF_ID')->widget(DepDrop::classname(), [
				'options' => ['id' => 'chef-id'],
				'pluginOptions' => [
					'depends' => ['chef-kitchen'],
					'placeholder' => '--- SELECT CHEF ---',
					'url' => Url::to(['/chef/chef-list'])
				]
			]); ?>
        </div>-->
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="form-group">
		<?= Html::submitButton('UPDATE ORDER', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
