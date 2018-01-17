<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\COUNTRY_MODEL */

$this->title = $model->COUNRY_ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country  Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country--model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->COUNRY_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->COUNRY_ID], [
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
            'COUNRY_ID',
            'COUNTRY_NAME',
        ],
    ]) ?>

</div>
