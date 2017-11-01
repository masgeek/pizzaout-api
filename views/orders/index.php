<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $confirmedOrder yii\data\ActiveDataProvider */
/* @var $preparingOrder yii\data\ActiveDataProvider */
/* @var $completedOrder yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$items = [
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Pending Orders',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $confirmedOrder]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Confirmed Orders',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $preparingOrder]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Ready For Delivery',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $completedOrder]),
	],
];
?>

<h1><?= Html::encode($this->title) ?></h1>

<?=
TabsX::widget([
	'items' => $items,
	'position' => TabsX::POS_ABOVE,
	'encodeLabels' => false,
	'bordered' => true,
]);
?>

