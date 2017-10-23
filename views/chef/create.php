<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\CHEF_MODEL */

$this->title = 'Create Chef  Model';
$this->params['breadcrumbs'][] = ['label' => 'Chef  Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chef--model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
