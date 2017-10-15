<?php

use kartik\detail\DetailView;

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
				'displayOnly' => true,
				'value' => "{$model->lOCATION->LOCATION_NAME}",
			],
			[
				'attribute' => 'ORDER_STATUS',
				'format' => 'raw',
				'displayOnly' => true,
				'value' => "<span class='badge' style='background-color: {$model->oRDERSTATUS->COLOR};'> </span>  <code>" . $model->ORDER_STATUS . '</code>',
				//'type' => DetailView::INPUT_COLOR,
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'ORDER_QUANTITY',
				'displayOnly' => true,
			],
			[
				'attribute' => 'ORDER_DATE',
				'displayOnly' => true,
				'format' => 'datetime',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'RIDER_ID',
				'displayOnly' => true,
			],
			[
				'attribute' => 'CHEF_ID',
				'displayOnly' => true,
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'KITCHEN_ID',
				'displayOnly' => true,
				'value' => $model->kITCHEN != null ? $model->kITCHEN->KITCHEN_NAME : 'Not Assigned',
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'PAYMENT_METHOD',
				'displayOnly' => true,
			],
			[
				'attribute' => 'NOTES',
				'displayOnly' => true,
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],

];
?>

<?= DetailView::widget([
	'model' => $model,
	'mode'=>DetailView::MODE_VIEW,
	'attributes' => $attributes,
]) ?>