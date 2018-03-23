<?php

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $orderItems app\model_extended\CUSTOMER_ORDER_ITEMS */
/* @var object $formatter */

/* @var $exception Exception */

use yii\helpers\Html;

?>

<table data-height="auto" class="table table-condensed table-border">
    <tbody>
    <tr>
        <td>NAME</td>
        <td><?= "{$model->uSER->SURNAME} {$model->uSER->OTHER_NAMES}"; ?></td>
    </tr>
    <tr>
        <td>MOBILE</td>
        <td><?= "{$model->uSER->MOBILE}"; ?></td>
    </tr>
    <tr>
        <td>ADDRESS</td>
        <td><?= "{$model->lOCATION->LOCATION_NAME} {$model->lOCATION->ADDRESS}"; ?></td>
    </tr>
    </tbody>
</table>
