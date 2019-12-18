<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_sales_reports".
 *
 * @property string $ORDER_ID
 * @property string $LOCATION_ID
 * @property string $KITCHEN_ID
 * @property string $CHEF_ID
 * @property string $RIDER_ID
 * @property string $ORDER_DATE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS Status of the order
 * @property string $ORDER_TIME
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $USER_ID
 * @property string $USER_NAME
 * @property string $USER_TYPE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $LOCATION_NAME
 * @property string $COUNTRY_ID
 * @property string $CHEF_NAME
 */
class VwSalesReports extends \app\models\base\VwSalesReports
{
    public $START_DATE;
    public $END_DATE;
    public $ORDER_TOTAL;

    const CONTEXT_ORDERS = 'orders-search';
    const CONTEXT_GENERAL = 'general-search';
    const CONTEXT_SALES = 'sales-search';
    const CONTEXT_RIDER = 'rider-search';
    const CONTEXT_CHEF = 'chef-search';
    const CONTEXT_KITCHEN = 'kitchen-search';
    const CONTEXT_LOCATION = 'location-search';

    public static function primaryKey()
    {
        return ['ORDER_ID'];
    }
}
