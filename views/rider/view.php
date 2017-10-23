<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */

$this->title = $model->RIDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Rider  Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rider--model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->RIDER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->RIDER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'RIDER_ID',
            'RIDER_NAME',
            'RIDER_MOBILE',
            'RIDER_STATUS',
        ],
    ]) ?>

</div>
