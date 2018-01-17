<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\LOCATION_MODEL */

$this->title = $model->LOCATION_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location  Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location--model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->LOCATION_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->LOCATION_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'LOCATION_ID',
            'CITY_ID',
            'LOCATION_NAME',
            'ADDRESS:ntext',
        ],
    ]) ?>

</div>
