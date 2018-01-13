<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\STATUS_MODEL */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status li'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STATUS_NAME, 'url' => ['view', 'id' => $model->STATUS_NAME]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="status--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
