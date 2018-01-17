<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\KITCHEN_MODEL */

$this->title = $model->KITCHEN_NAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kitchens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kitchen--model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->KITCHEN_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->KITCHEN_ID], [
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
            //'KITCHEN_ID',
            'KITCHEN_NAME',
            'cITY.CITY_NAME',
            'OPENING_TIME',
            'CLOSING_TIME',
            'ADDRESS:ntext',
        ],
    ]) ?>

</div>
