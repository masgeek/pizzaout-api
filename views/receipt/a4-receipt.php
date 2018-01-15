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
        <td>Name <?= "{$model->uSER->SURNAME} {$model->uSER->OTHER_NAMES}"; ?></td>
    </tr>
    <tr>
        <td>Address <?= "{$model->lOCATION->LOCATION_NAME} {$model->lOCATION->ADDRESS}"; ?></td>
    </tr>

    </tr>
    </tbody>
</table>
