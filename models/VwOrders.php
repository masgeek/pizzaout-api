<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_orders".
 *
 * @property int $ORDER_ID
 * @property int $USER_ID
 * @property int $KITCHEN_ID
 * @property int $CHEF_ID
 * @property int $RIDER_ID
 * @property string $MOBILE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $ORDER_DATE
 * @property string $ORDER_STATUS Status of the order
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_NUMBER
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $PAYMENT_METHOD
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $PAYMENT_DATE
 * @property int $LOCATION_ID
 * @property string $LOCATION_NAME
 * @property string $ADDRESS
 * @property string $CITY_NAME
 * @property int $CITY_ID
 * @property int $COUNRY_ID
 * @property string $COUNTRY_NAME
 * @property string $ORDER_TIME
 */
class VwOrders extends \app\models\base\VwOrders
{
}
