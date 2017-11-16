<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode($this->title) ?></h2>

<?= $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]) ?>

