<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CITY_MODEL */

$this->title = $model->CITY_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City  Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city--model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->CITY_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->CITY_ID], [
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
            'CITY_ID',
            'CITY_NAME',
            'COUNTRY_ID',
        ],
    ]) ?>

</div>
