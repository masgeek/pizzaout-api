<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_CATEGORY */

$this->title = 'Update Menu Category: ' . $model->MENU_CAT_NAME;
$this->params['breadcrumbs'][] = ['label' => 'Menu Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MENU_CAT_ID, 'url' => ['view', 'id' => $model->MENU_CAT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu--category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
