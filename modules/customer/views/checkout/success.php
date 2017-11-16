<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 15-Nov-17
 * Time: 15:03
 */

use kartik\growl\Growl;
use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Growl::widget([
    'type' => $growl_type,
    'title' => $title,
    'icon' => 'glyphicon glyphicon-remove-sign',
    'body' => $message,
    'showSeparator' => true,
    //'delay' => 4500,
    'pluginOptions' => [
        'showProgressbar' => true,
        'placement' => [
            'from' => 'bottom',
            'align' => 'center',
        ],
        'animate' => [
            'enter' => 'animated fadeInDown',
            'exit' => 'animated fadeOutUp'
        ],
    ]
]); ?>

<h2><?= Html::encode($this->title) ?></h2>

<?= $this->render('/orders/_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]) ?>
