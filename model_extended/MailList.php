<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 3/23/2018
 * Time: 11:51 PM
 */

namespace app\model_extended;


use app\helpers\APP_UTILS;
use app\models\MailQueue;

class MailList extends MailQueue
{
    const  CUST_ALL = 'all';
    const  CUST_PAST_ORDERS = 'past_orders';
    const  CUST_NO_ORDERS = 'no_orders';

    public $category;

    public $email;
    public $sms;

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['category'], 'string'];
        $rules[] = [['email', 'sms'], 'boolean'];

        $rules[] = [['category', 'body', 'subject'], 'required'];

        return $rules;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $this->created_at = APP_UTILS::GetCurrentDateTime();
            }
            $this->updated_at = APP_UTILS::GetCurrentDateTime();
            return true;
        }

        return false;
    }

    public static function GetCustCategories()
    {
        return [
            self::CUST_ALL => 'All customers',
            self::CUST_PAST_ORDERS => 'Customers With Past Orders',
            self::CUST_NO_ORDERS => 'Customers with no orders'
        ];
    }

    /**
     * @return \app\api\modules\v1\models\USER_MODEL[]|CUSTOMER_ORDERS[]|USERS_MODEL[]|array|\yii\db\ActiveRecord[]
     */
    public function EvaluateCategory()
    {
        $customers = [];
        switch ($this->category) {
            case self::CUST_ALL:
                //all customers
                $customers = $this->GetAllUsers();
                break;
            case self::CUST_PAST_ORDERS:
                //with past orders
                $customers = $this->GetWithOrders();
                break;
            case  self::CUST_NO_ORDERS:
                //with no orders
                $customers = $this->GetWithNoOrders();
                break;
        }

        return $customers;
    }

    /**
     * @return \app\api\modules\v1\models\USER_MODEL[]|CUSTOMER_ORDERS[]|USERS_MODEL[]|array|\yii\db\ActiveRecord[]
     */
    private function GetAllUsers()
    {
        $users = USERS_MODEL::find()
            ->all();

        return $users;
    }


    /**
     * @return \app\api\modules\v1\models\USER_MODEL[]|CUSTOMER_ORDERS[]|USERS_MODEL[]|array|\yii\db\ActiveRecord[]
     */
    private function GetWithOrders()
    {
        $filterList = [];
        //first get the orders list
        $orderList = $this->OrderFilter();

        foreach ($orderList as $key => $order) {
            $filterList[] = $order['USER_ID'];
        }

        $users = USERS_MODEL::find()
            ->where(['IN', 'USER_ID', $filterList])
            ->all();

        return $users;
    }

    /**
     * @return \app\api\modules\v1\models\USER_MODEL[]|CUSTOMER_ORDERS[]|USERS_MODEL[]|array|\yii\db\ActiveRecord[]
     */
    private function GetWithNoOrders()
    {
        $filterList = [];
        //first get the orders list
        $orderList = $this->OrderFilter();

        foreach ($orderList as $key => $order) {
            $filterList[] = $order['USER_ID'];
        }

        $users = USERS_MODEL::find()
            ->where(['NOT IN', 'USER_ID', $filterList])
            ->all();

        return $users;
    }

    /**
     * @return \app\api\modules\v1\models\USER_MODEL[]|CUSTOMER_ORDERS[]|USERS_MODEL[]|array|\yii\db\ActiveRecord[]
     */
    private function OrderFilter()
    {
        $orders = CUSTOMER_ORDERS::find()
            ->groupBy(['USER_ID'])
            ->asArray()
            ->all();

        return $orders;
    }
}