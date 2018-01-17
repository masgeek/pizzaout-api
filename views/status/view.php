<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\STATUS_MODEL */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Status Management'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->STATUS_NAME], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->STATUS_NAME], [
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
            'STATUS_NAME',
            'STATUS_DESC',
            [
                'label' => 'COLOR',
                'format'=>'raw',
                'value' => "<span class='badge' style='background-color: {$model->COLOR}'> </span>  <code>" . $model->COLOR . '</code>'
            ],
            'SCOPE',
            'RANK',
            'WORKFLOW',
        ],
    ]) ?>

</div>
