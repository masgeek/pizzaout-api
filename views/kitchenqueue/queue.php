<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 60000);
});
JS;
$this->registerJs($script);
?>

<div class="kitchen-queue">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?= Html::a("Refresh", ['kitchenqueue/display'], ['class' => 'btn btn-md btn-default btn-block', 'id' => 'refreshButton']) ?>
    <h3>Last Update: <?= $time ?></h3>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'itemOptions' => ['class' => 'item'],
        'layout' => "{items}",
        'itemView' => '_queueView.php',
    ]) ?>
    <?php Pjax::end(); ?>
</div> 