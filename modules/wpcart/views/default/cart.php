<?php
/* @var array $cartItems */

/* @var $orderItems \app\model_extended\WP_CART_MODEL */

use yii\helpers\Html;
use yii\helpers\Url;
use smallbearsoft\ajax\Ajax;
use yii\web\JsExpression;

$formatter = \Yii::$app->formatter;

$orderSubTotal = 0.0;
$vat = 0;
$deliveryFee = 0;

$this->registerJsFile('@web/css/wpcart/js/update-wp-cart.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<hr/>
<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <table class="table table-hover table-bordered table-condensed">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <!-- begin product look -->
            <?php
            foreach ($cartItems as $key => $orderItems):
                $itemTotal = (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                $itemSubtotal = (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                $orderSubTotal = $orderSubTotal + (int)$orderItems->QUANTITY * (float)$orderItems->ITEM_PRICE;
                ?>
                <tr id="ROW_<?= $orderItems->ITEM_TYPE_ID ?>">
                    <td>
                        <h4><?= "{$orderItems->iTEMTYPE->mENUITEM->MENU_ITEM_NAME} ({$orderItems->iTEMTYPE->ITEM_TYPE_SIZE})"; ?></h4>
                    </td>
                    <td style="text-align: center">
                        <?= Html::textInput('QTY', $orderItems->QUANTITY, [
                            'id' => 'QTY_' . $orderItems->ITEM_TYPE_ID,
                            'min' => 1,
                            'readonly' => true,
                            'type' => 'number',
                            'class' => 'form-control',
                            'onchange' => new JsExpression('
                                        var MENU_ITEM_ID = ' . \yii\helpers\Json::htmlEncode($orderItems->CART_GUID) . ';
                                        var ITEM_TYPE_SIZE = ' . \yii\helpers\Json::htmlEncode($orderItems->ITEM_TYPE_SIZE) . ';
                                        var ITEM_PRICE = ' . \yii\helpers\Json::htmlEncode($orderItems->ITEM_PRICE) . ';
                                        var ITEM_TYPE_ID = ' . \yii\helpers\Json::htmlEncode($orderItems->ITEM_TYPE_ID) . ';
                                        
                                        var qty = $("#QTY_"+ITEM_TYPE_ID).val();
                              
                                        var subtotal = qty*ITEM_PRICE;
                                        
                                        $("#subtotal_"+ITEM_TYPE_ID).html(subtotal.toFixed(2));
                                        
                                        var postData = { 
                                            MENU_ITEM_ID:MENU_ITEM_ID,
                                            ITEM_TYPE_SIZE:ITEM_TYPE_SIZE,
                                            ITEM_PRICE:ITEM_PRICE,
                                            ITEM_TYPE_ID:ITEM_TYPE_ID,
                                            QUANTITY:qty,
                                            SUB_TOTAL:subtotal
                                        };
                                        
                                        console.log(postData);
                                        //updateWpCart(qty)
                                    ')
                        ]) ?>
                    </td>
                    <td class="text-center">
                        <strong><?= $formatter->asCurrency($orderItems->ITEM_PRICE) ?></strong>
                    </td>
                    <td class="text-center">
                        <strong id="subtotal_<?= $orderItems->ITEM_TYPE_ID ?>"><?= $formatter->asCurrency($itemSubtotal) ?></strong>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-block"
                                onclick="removeRow(<?= $orderItems->ITEM_TYPE_ID ?>)"
                                id="REMOVE_<?= $orderItems->ITEM_TYPE_ID ?>">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button>
                    </td>
                </tr>
            <?php
            endforeach;
            $orderTotal = ($vat + $deliveryFee + $orderSubTotal);
            ?>
            <!-- end of product look -->

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"><h5>Subtotal</h5></td>
                <td class="text-right"><h5><strong><?= $formatter->asCurrency($orderSubTotal) ?></strong></h5></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"><h5>V.A.T</h5></td>
                <td class="text-right"><h5><strong><?= $formatter->asCurrency($vat) ?></strong></h5></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2"><h5>Delivery Fee</h5></td>
                <td class="text-right"><h5><strong><?= $formatter->asCurrency($deliveryFee) ?></strong></h5></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">
                    <h3>Order Total</h3>
                </td>
                <td class="text-right"><h3><strong><?= $formatter->asCurrency($orderTotal) ?></strong></h3></td>
            </tr>
            <tr>
                <td colspan="4">
                    <?= Html::a('<i class="glyphicon glyphicon-shopping-cart"></i> Continue Shopping', ['//wpcart'], [
                        'class' => 'btn btn-default'
                    ]) ?>
                </td>
                <td>
                    <?= Html::a('<i class="glyphicon glyphicon-play"></i> Continue Shopping', ['checkout'], [
                        'class' => 'btn btn-success'
                    ]) ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>