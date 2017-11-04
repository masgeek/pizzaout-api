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
			/* @var $model app\models_search\OrdersSearch */
			$url = '#';
			if ($action === 'update') {
				$action = '<i class="fa fa-pencil fa-1x"></i><br/>Confirm';
				$url = \yii\helpers\Url::toRoute(['update', 'id' => $model->ORDER_ID]);
			}

			return Html::a($action, $url, ['class' => 'btn btn-default']);
		},
	],
	[
		'class' => '\kartik\grid\ActionColumn',
		'template' => '{rider}',
		'buttons' => [
			'rider' => function ($url, $model, $key) {
				return $url;
			},
		],
		'urlCreator' => function ($action, $model, $key, $index) {
			/* @var $model app\models_search\OrdersSearch */
			$url = '#';
			if ($model->ORDER_STATUS == \app\helpers\ORDER_STATUS_HELPER::STATUS_AWAITING_RIDER) {
				if ($action === 'rider') {
					$action = 'Assign Rider';
					$url = \yii\helpers\Url::toRoute(['rider', 'id' => $model->ORDER_ID]);
				}

				return Html::a($action, $url, ['class' => 'btn btn-success btn-xs btn-block']);
			} else {
				$action = null;
			}
		},
	],
	'ORDER_ID',
	//'USER_ID',
	[
		'attribute' => 'USER_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			$names = "{$model->uSER->SURNAME} {$model->uSER->OTHER_NAMES}";
			return ucwords(strtolower($names));
		}
	],
	[
		'header' => 'Delivery Location',
		'attribute' => 'LOCATION_ID',
		'format' => 'raw',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			$address = "{$model->aDDRESS->ADDRESS} <br/>{$model->aDDRESS->lOCATION->LOCATION_NAME}";
			return ucwords(strtolower($address));
		}
	],
	[
		'header' => 'Chef',
		'filter' => false,
		'attribute' => 'CHEF_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->cHEF != null ? $model->cHEF->CHEF_NAME : 'N/A';
		}
	],
	[
		'header' => 'Rider',
		'filter' => false,
		'attribute' => 'RIDER_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->rIDER != null ? $model->rIDER->RIDER_NAME : 'N/A';
		}
	],
	[
		'header' => 'Cost',
		'filter' => false,
		'format' => 'currency',
		'attribute' => 'ORDER_ID',
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
		}
	],
	'ORDER_DATE:datetime',
	'PAYMENT_METHOD',
	'ORDER_STATUS',
	'NOTES',
	[
		'class' => '\kartik\grid\ActionColumn',
		'template' => '{view}',
	],
];

?>


<?= GridView::widget([
	'dataProvider' => $dataProvider,
	//'filterModel' => $searchModel,
	'columns' => $gridColumns,
	'beforeHeader' => [
		[
			'columns' => [
				['content' => $this->title, 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
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
	'floatHeader' => false,
	'showPageSummary' => false,
	'panel' => false,
]); ?>
