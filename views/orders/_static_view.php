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
				'attribute' => 'KITCHEN_ID',
				'value' => $model->kITCHEN != null ? $model->kITCHEN->KITCHEN_NAME : 'Not Assigned',
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

<?= DetailView::widget([
	'model' => $model,
	'attributes' => $attributes,
]) ?>