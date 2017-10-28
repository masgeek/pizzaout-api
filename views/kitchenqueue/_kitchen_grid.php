<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$gridColumns = [
	['class' => 'yii\grid\SerialColumn'],
	[
		'class' => '\kartik\grid\ActionColumn',
		'template' => '{update}',
		'buttons' => [
			'update' => function ($url, $model, $key) {
				return $url;
			},
		],
		'urlCreator' => function ($action, $model, $key, $index) {
			$url = '#';
			if ($action === 'update') {
				$action = 'Process Order';
				$url = \yii\helpers\Url::toRoute(['update', 'id' => $model->ORDER_ID]);
			}

			return Html::a($action, $url, ['class' => 'btn btn-danger btn-xs btn-block']);
		},
	],
	'ORDER_ID',
	//'USER_ID',
	[
		'attribute' => 'USER_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return "{$model->uSER->SURNAME} {$model->uSER->OTHER_NAMES}";
		}
	],
	[
		//'header' => 'Delivery Location',
		'attribute' => 'LOCATION_ID',
		'visible' => false,
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->lOCATION->LOCATION_NAME;
		}
	],
	[
		'header' => 'Assigned Chef',
		'attribute' => 'CHEF_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->cHEF != null ? $model->cHEF->CHEF_NAME : 'N/A';
		}
	],
	[
		'header' => 'Assigned Rider',
		'attribute' => 'RIDER_ID',
		'visible' => false,
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->rIDER != null ? $model->rIDER->RIDER_NAME : 'N/A';
		}
	],
	[
		'header' => 'Kitchen Name',
		'attribute' => 'KITCHEN_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->kITCHEN != null ? $model->kITCHEN->KITCHEN_NAME : 'N/A';
		}
	],
	'ORDER_QUANTITY',
	'ORDER_DATE:datetime',
	'ORDER_PRICE:decimal',
	//'PAYMENT_METHOD',
	'ORDER_STATUS',
	'NOTES',
];
?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => $gridColumns,
		'beforeHeader' => [
			[
				'columns' => [
					['content' => 'Kitchen Queue Items', 'options' => ['colspan' => 4, 'class' => 'text-center success']],
				],
				'options' => ['class' => 'skip-export'] // remove this row from export
			]
		],
		'pjax' => false,
		'bordered' => true,
		'striped' => true,
		'condensed' => true,
		'responsive' => true,
		'hover' => true,
		'floatHeader' => true,
		'showPageSummary' => false,
		'panel' => false,
	]); ?>