<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu  Items';
$this->params['breadcrumbs'][] = $this->title;

$listviewWidget = ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        //'tag' => 'div',
        //'class' => 'list-wrapper',
        'id' => 'menu_list',
    ],
    'layout' => "{items}",
    //'layout' => "{pager}\n{items}\n{summary}",
    'itemView' => 'menu_box']);

?>


<?= $listviewWidget ?>
