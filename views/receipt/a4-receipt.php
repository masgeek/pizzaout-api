<?php

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $orderItems app\model_extended\CUSTOMER_ORDER_ITEMS */
/* @var object $formatter */

/* @var $exception Exception */

use yii\helpers\Html;

?>

<table data-height="auto" class="table table-condensed table-border">
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th width="65%">Name/Options</th>
        <th class="text-left">Price</th>
        <th class="text-right">Sub Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $orderTotal = 0.0;
    foreach ($model->customerOrderItems as $orderItems):?>
        <tr>
            <td><?= "{$orderItems->QUANTITY}x"; ?></td>
            <td><?= "{$orderItems->iTEMTYPE->mENUITEM->MENU_ITEM_NAME} ({$orderItems->iTEMTYPE->ITEM_TYPE_SIZE})"; ?></td>
        </tr>
        <?php
        //lets do the order total here
        $orderTotal = $orderTotal + (float)$orderItems->SUBTOTAL;
    endforeach; ?>
    <tr>
        <td class="thick-line"></td>
        <td class="thick-line"></td>
    </tr>
    </tbody>
</table>
