<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 4/16/2018
 * Time: 5:37 PM
 */

namespace app\model_extended;


use app\models\Chef;
use app\models\CustomerOrderItem;
use app\models\Kitchen;
use app\models\Location;
use app\models\Payment;
use app\models\Riders;
use app\models\Status;
use app\models\Users;
use app\models\VwSalesReports;

/**
 *
 * @property Users $uSER
 * @property Riders $rIDER
 * @property Kitchen $kITCHEN
 * @property Status $oRDERSTATUS
 * @property Chef $cHEF
 * @property Location $lOCATION
 * @property CustomerOrderItem[] $customerOrderItems
 * @property Payment[] $payments
 */
class ReportModel extends VwSalesReports
{
    public $START_DATE;
    public $END_DATE;

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

    public function attributeLabels()
    {
        //$labels = parent::attributeLabels();
        $labels = [
            'ORDER_ID' => 'Order  ID',
            'LOCATION_ID' => 'Location',
            'KITCHEN_ID' => 'Kitchen',
            'CHEF_ID' => 'Chef',
            'RIDER_ID' => 'Rider',
            'ORDER_DATE' => 'Order Date',
            'PAYMENT_METHOD' => 'Payment Method',
            'ORDER_STATUS' => 'Order Status',
            'ORDER_TIME' => 'Order Time',
            'NOTES' => 'Can contain payment text from mobile transactions etc',
            'CREATED_AT' => 'Created',
            'UPDATED_AT' => 'Updated',
            'USER_ID' => 'Customer',
            'USER_NAME' => 'Customer Username',
            'USER_TYPE' => 'User Type',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other Names',
            'LOCATION_NAME' => 'Location Name',
            'COUNTRY_ID' => 'Country ID',
            'CHEF_NAME' => 'Chef Name',
        ];

        return $labels;
    }

    /** Create relations here  **/
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Users::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRIDER()
    {
        return $this->hasOne(Riders::className(), ['RIDER_ID' => 'RIDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKITCHEN()
    {
        return $this->hasOne(Kitchen::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDERSTATUS()
    {
        return $this->hasOne(Status::className(), ['STATUS_NAME' => 'ORDER_STATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCHEF()
    {
        return $this->hasOne(Chef::className(), ['CHEF_ID' => 'CHEF_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOCATION()
    {
        return $this->hasOne(Location::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrderItems()
    {
        return $this->hasMany(CustomerOrderItem::className(), ['ORDER_ID' => 'ORDER_ID']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}