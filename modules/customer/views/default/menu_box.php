<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Nov-17
 * Time: 11:40
 *
 * @var $model \app\model_extended\MENU_ITEMS
 * @var $itemType \app\model_extended\MENU_ITEM_TYPE
 */

use yii\helpers\Html;
use yii\helpers\Url;

$image = \app\helpers\APP_UTILS::BuildImageUrl($model->MENU_ITEM_IMAGE, false);
$prevCat = null;
?>

<div class="panel-group">
    <!--<h3><?= $model->mENUCAT->MENU_CAT_NAME ?></h3>-->
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="col-md-2">
                <?= Html::img("$image", ['alt' => 'Pizza Out', 'class' => 'img img-thumbnail']); ?>
            </div>
            <div class="col-md-4">
                <p class="large-text"><?= $model->MENU_ITEM_NAME ?></p>
                <p class="muted"><?= $model->MENU_ITEM_DESC ?></p>
            </div>
            <div class="col-md-6">
                <table class="table  table-hover">
                    <?php foreach ($model->menuItemTypes as $key => $itemType): ?>
                        <tr>
                            <td valign="center">
                                <p class="large-text">
                                    <?= $itemType->ITEM_TYPE_SIZE ?>
                                </p>
                            </td>
                            <td class="text-center">
                                <p class="large-text">
                                    <?= $itemType->PRICE ?>
                                </p>
                            </td>
                            <td class="text-center">
                                <?= Html::a('<i class="fa fa-plus-circle"></i>',
                                    ['//customer/default/add'], [
                                        'class' => 'btn btn-default',
                                        'data-method' => 'POST',
                                        'data-params' => [
                                            'MENU_ITEM_ID' => $model->MENU_ITEM_ID,
                                            'ITEM_TYPE_ID' => $itemType->ITEM_TYPE_ID,
                                            'ITEM_TYPE_SIZE' => $itemType->ITEM_TYPE_SIZE,
                                            'ITEM_PRICE' => $itemType->PRICE,
                                            'QUANTITY' => 1,
                                        ],
                                    ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
