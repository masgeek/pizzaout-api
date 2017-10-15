<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer  Orders';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
	['class' => 'yii\grid\SerialColumn'],

	[
		'class' => 'kartik\grid\ActionColumn',
		'dropdown' => false,
		'template' => '{update}',
		'vAlign' => 'middle',
		/*'urlCreator' => function ($action, $model, $key, $index) {
			return '#';
		},*/
		//'viewOptions' => ['title' => $viewMsg, 'data-toggle' => 'tooltip'],
		'updateOptions' => ['title' => 'Process Order', 'data-toggle' => 'tooltip'],
		//'deleteOptions' => ['title' => $deleteMsg, 'data-toggle' => 'tooltip'],
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
		'value' => function ($model) {
			/* @var $model \app\model_extended\CUSTOMER_ORDERS */
			return $model->lOCATION->LOCATION_NAME;
		}
	],
	'CHEF_ID',
	'RIDER_ID',
	'ORDER_QUANTITY',
	'ORDER_DATE:datetime',
	'ORDER_PRICE:decimal',
	'PAYMENT_METHOD',
	'ORDER_STATUS',
	'NOTES',
	//'CREATED_AT:datetime',
	//'UPDATED_AT:datetime',

	//['class' => 'yii\grid\ActionColumn'],
];
?>
<div class="customer--orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Create Customer  Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => $gridColumns,
		'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
		'beforeHeader' => [
			[
				'columns' => [
					['content' => 'Customer Orders', 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
				],
				'options' => ['class' => 'skip-export'] // remove this row from export
			]
		],
		'pjax' => true,
		'bordered' => true,
		'striped' => true,
		'condensed' => true,
		'responsive' => true,
		'hover' => true,
		'floatHeader' => true,
		'showPageSummary' => false,
		'panel' => false,
	]); ?>
</div>
