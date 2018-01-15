<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $kitchenAllocated yii\data\ActiveDataProvider */
/* @var $chefAssigned yii\data\ActiveDataProvider */
/* @var $preparingOrder yii\data\ActiveDataProvider */
/* @var $orderReady yii\data\ActiveDataProvider */
/* @var $awaitingRider yii\data\ActiveDataProvider */
/* @var $allocatedRider yii\data\ActiveDataProvider */
/* @var $dispatchRider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['//receipt/print']];

$items = [
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Kitchen Allocated',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $kitchenAllocated]),
        'visible' => false,
	],
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Chef Assigned',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $chefAssigned]),
        'visible' => false,
	], [
		'label' => '<i class="glyphicon glyphicon-book"></i> Preparing Order',
        'active'=>true,
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $preparingOrder]),
	], [
		'label' => '<i class="glyphicon glyphicon-book"></i> Order Ready',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $orderReady]),
	], [
		'label' => '<i class="glyphicon glyphicon-book"></i> Awaiting Rider',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $awaitingRider]),
        'visible' => false,
	], [
		'label' => '<i class="glyphicon glyphicon-book"></i> Rider Assigned',
        'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $allocatedRider]),
        'visible' => false,
	], [
		'label' => '<i class="glyphicon glyphicon-book"></i> Rider Dispatched',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $dispatchRider]),
	]
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

