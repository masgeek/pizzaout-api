<?php
/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\widgets\ListView;


$listviewWidget = ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        //'tag' => 'ol',
        //'class' => 'menu-item-listing',
        'id' => 'menu_list',
    ],
    'layout' => "{items}",
    //'layout' => "{pager}\n{items}\n{summary}",
    'itemView' => '_menu-view']);

?>

<section class="menu-items">
    <?= $listviewWidget ?>
</section>
