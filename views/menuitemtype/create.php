<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEM_TYPE */

$this->title = 'Create Menu  Item  Type';
$this->params['breadcrumbs'][] = ['label' => 'Menu  Item  Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--item--type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
