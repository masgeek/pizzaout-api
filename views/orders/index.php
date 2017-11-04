<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $confirmedOrder yii\data\ActiveDataProvider */
/* @var $pendingOrder yii\data\ActiveDataProvider */
/* @var $preparingOrder yii\data\ActiveDataProvider */
/* @var $orderReady yii\data\ActiveDataProvider */
/* @var $cancelledOrder yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$items = [
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Pending Orders',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $pendingOrder]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Confirmed Orders',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $confirmedOrder]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Under Preparation',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $preparingOrder]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Order Ready',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $orderReady]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Cancelled Orders',
		'content' => $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $cancelledOrder]),
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

