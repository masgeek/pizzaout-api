<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;


/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $confirmedOrder yii\data\ActiveDataProvider */
/* @var $preparingOrder yii\data\ActiveDataProvider */
/* @var $completedOrder yii\data\ActiveDataProvider */
/* @var $pendingDelivery yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;


$items = [
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Assign Chef',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $confirmedOrder]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Preparing',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $preparingOrder]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Ready For Delivery',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $completedOrder]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Assign Rider',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $pendingDelivery]),
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

