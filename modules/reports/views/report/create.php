<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\ReportModel */

$this->title = 'Create Report Model';
$this->params['breadcrumbs'][] = ['label' => 'Report Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
