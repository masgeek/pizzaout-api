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
                                <?= Html::textInput('QTY', 1, [
                                    'id' => 'QTY_' . $itemType->ITEM_TYPE_ID,
                                    'min' => 1,
                                    'type' => 'number',
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
                                    'dataType' => 'json',
                                    //'success' => new \yii\web\JsExpression('function(data, textStatus, jqXHR) {alert(data)}'),
                                    //'error' => new JsExpression('function(jqXHR, textStatus, errorThrown) {alert(errorThrown)}'),
                                    'beforeSend' => new JsExpression('function(data,jqXHR, settings) {
                                        var MENU_ITEM_ID = ' . \yii\helpers\Json::htmlEncode($itemType->MENU_ITEM_ID) . ';
                                        var ITEM_TYPE_SIZE = ' . \yii\helpers\Json::htmlEncode($itemType->ITEM_TYPE_SIZE) . ';
                                        var ITEM_PRICE = ' . \yii\helpers\Json::htmlEncode($itemType->PRICE) . ';
                                        var ITEM_TYPE_ID = ' . \yii\helpers\Json::htmlEncode($itemType->ITEM_TYPE_ID) . ';
                                        
                                        var qty = $("#QTY_"+ITEM_TYPE_ID).val();
                     
                                       
                                        var subtotal = qty*ITEM_PRICE;
                            
                                        this.data += "&" + $.param({ 
                                            MENU_ITEM_ID:MENU_ITEM_ID,
                                            ITEM_TYPE_SIZE:ITEM_TYPE_SIZE,
                                            ITEM_PRICE:ITEM_PRICE,
                                            ITEM_TYPE_ID:ITEM_TYPE_ID,
                                            QUANTITY:qty,
                                            SUB_TOTAL:subtotal
                                        });
                            
                                        //console.log(data);
                                    }'),
                                    'success' => new JsExpression('function(data) {
                                        var ITEM_TYPE_ID = ' . \yii\helpers\Json::htmlEncode($itemType->ITEM_TYPE_ID) . ';
                                        var MENU_ITEM_ID = ' . \yii\helpers\Json::htmlEncode($itemType->MENU_ITEM_ID) . ';
                                        
                                        var $cart = $("#add_to_cart_"+ITEM_TYPE_ID);
                                        var $cartSpan = $("#add_to_cart_span_"+ITEM_TYPE_ID);
                                        var $qtyInput = $("#QTY_"+ITEM_TYPE_ID);
                                        var $messageSpan = $("#message_"+MENU_ITEM_ID);
                                        var $cartCount = $("#cart_count");
                                        
                                        if(data.ADDED===true){
                                            $cart.removeClass("btn-primary btn-danger").addClass("btn-success");
                                            $cartSpan.removeClass("fa-plus-circle fa-remove").addClass("fa-check");
                                            $qtyInput.removeClass("cart-error").addClass("cart-success");
                                        }else{
                                            $cart.removeClass("btn-primary btn-success").addClass("btn-danger");
                                            $cartSpan.removeClass("fa-plus-circle fa-check").addClass("fa-remove");
                                            $qtyInput.removeClass("cart-success").addClass("cart-error");
                                        }
                                        $messageSpan.html(data.MESSAGE);
                                        $cartCount.html(data.CART_COUNT);
                                    }'),
                                    'error' => new JsExpression('function(jqXHR, ajaxOptions,thrownError) {
                                        var ITEM_TYPE_ID = ' . \yii\helpers\Json::htmlEncode($itemType->ITEM_TYPE_ID) . ';
                                        var $cart = $("#add_to_cart_"+ITEM_TYPE_ID);
                                        var $cartSpan = $("#add_to_cart_span_"+ITEM_TYPE_ID);
                                        var $qtyInput = $("#QTY_"+ITEM_TYPE_ID);
                                        
                                        $cart.removeClass("btn-primary").addClass("btn-danger");
                                        $cartSpan.removeClass("fa-plus-circle").addClass("fa-remove");
                                        $qtyInput.addClass("cart-error");
                                    }'),
                                    //'complete' => new JsExpression('function(jqXHR, textStatus) {alert("Complete.")}'),
                                    'timeout' => 10000
                                ]]) ?>

                                <?= Html::a('<i class="fa fa-plus-circle" id="add_to_cart_span_' . $itemType->ITEM_TYPE_ID . '"></i>',
                                    ['add-to-cart'], [
                                        'id' => 'add_to_cart_' . $itemType->ITEM_TYPE_ID,
                                        'class' => 'btn btn-primary',
                                        'data-ajax' => 1,
                                        'ajax-method' => 'POST',
                                        'ajax-data' => []
                                    ]) ?>
                                <?php Ajax::end() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="panel panel-footer">
            <h4><span id="message_<?= $model->MENU_ITEM_ID ?>">Message</span></h4>
        </div>
    </div>
</div>