<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */

$this->title = 'Create Rider  Model';
$this->params['breadcrumbs'][] = ['label' => 'Rider  Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rider--model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
