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
use smallbearsoft\ajax\Ajax;
use yii\web\JsExpression;


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
                <h4 class="large-text"><?= $model->MENU_ITEM_NAME ?></h4>
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
                                <p class="large-text" id="subtotal_<?= $itemType->ITEM_TYPE_ID ?>">
                                    <?= $itemType->PRICE ?>
                                </p>
                            </td>
                            <td class="text-center">
                                <?= Html::textInput('QTY', '1', [
                                    'id' => 'QTY_' . $itemType->ITEM_TYPE_ID,
                                    'min'=>1,
                                    'type'=>'number',
                                    'class' => 'form-control',
                                    'onchange' => new JsExpression('
                                        var itemTypeId = ' . \yii\helpers\Json::htmlEncode($itemType->ITEM_TYPE_ID) . ';
                                        var qty = $("#QTY_"+itemTypeId).val();
                                        var price = $("#PRICE_"+itemTypeId).val();
                                        var subtotal = qty*price;
                                        $("#subtotal_"+itemTypeId).html(subtotal.toFixed(2));
                                    ')
                                ]) ?>
                                <?= Html::hiddenInput('PRICE_', $itemType->PRICE, [
                                    'id' => 'PRICE_' . $itemType->ITEM_TYPE_ID,
                                    'class' => 'form-control',
                                    'readonly' => true
                                ]) ?>
                            </td>
                            <td class="text-center">
                                <?php Ajax::begin(['clientOptions' => [
                                    'method' => 'POST',
                                    //'success' => new \yii\web\JsExpression('function(data, textStatus, jqXHR) {alert(data)}'),
                                    //'error' => new JsExpression('function(jqXHR, textStatus, errorThrown) {alert(errorThrown)}'),
                                    'beforeSend' => new JsExpression('function(data,jqXHR, settings) {
                                        var itemTypeId = ' . \yii\helpers\Json::htmlEncode($itemType->ITEM_TYPE_ID) . ';
                                        var qty = $("#QTY_"+itemTypeId).val();
                                        var price = $("#PRICE_"+itemTypeId).val();
                                       
                                        var subtotal = qty*price;
                            
                                        this.data += \'&\' + $.param({ QUANTITY:qty});
                                        this.data += \'&\' + $.param({ SUB_TOTAL:subtotal});
                                        console.log(data);
                                    }'),
                                    //'complete' => new JsExpression('function(jqXHR, textStatus) {alert("Complete.")}'),
                                    'timeout' => 10000
                                ]]) ?>
                                <!--a href="<?= Url::to(['site/response']) ?>" data-ajax="1" class="btn btn-default"><i class="fa fa-plus-circle"></i></a-->

                                <?= Html::a('<i class="fa fa-plus-circle"></i>',
                                    ['add-to-cart'], [
                                        'class' => 'btn btn-primary',
                                        'data-ajax' => 1,
                                        'ajax-method' => 'POST',
                                        'ajax-data' => [
                                            'MENU_ITEM_ID' => $model->MENU_ITEM_ID,
                                            'ITEM_TYPE_ID' => $itemType->ITEM_TYPE_ID,
                                            'ITEM_TYPE_SIZE' => $itemType->ITEM_TYPE_SIZE,
                                            'ITEM_PRICE' => $itemType->PRICE,
                                        ],
                                    ]) ?>
                                <?php Ajax::end() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
