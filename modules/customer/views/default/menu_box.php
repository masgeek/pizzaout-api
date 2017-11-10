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
        <div class="col-md-4">
            <?= Html::img("{$model->MENU_ITEM_IMAGE}", ['alt' => 'Pizza Slice', 'class' => 'img img-thumbnail']); ?>
        </div>
        <div class="col-md-4">
            <?= $model->MENU_ITEM_DESC ?>
        </div>
        <div class="col-md-4">
            <table class="table table-condensed">
                <?php foreach ($model->menuItemTypes as $key => $itemType): ?>
                    <tr>
                        <td><?= $itemType->ITEM_TYPE_SIZE ?></td>
                        <td><?= $itemType->PRICE ?></td>
                        <td>&plus;</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
