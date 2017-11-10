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

?>


<div class="panel panel-success">
    <div class="panel-body">
        <div class="col-md-2">
            <?= Html::img("{$model->MENU_ITEM_IMAGE}", ['alt' => 'Pizza Slice', 'class' => 'img img-thumbnail']); ?>
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
                            <?= Html::a('<i class="fa fa-plus-circle"></i>', ['//customer/defaults/add', $model->MENU_ITEM_ID], ['class' => 'btn btn-default']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
