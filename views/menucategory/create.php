<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_CATEGORY */

$this->title = 'Create Menu  Category';
$this->params['breadcrumbs'][] = ['label' => 'Menu  Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
