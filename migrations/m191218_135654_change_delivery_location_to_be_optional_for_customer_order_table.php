<?php

use yii\db\Migration;

/**
 * Class m191218_135654_change_delivery_location_to_be_optional_for_customer_order_table
 */
class m191218_135654_change_delivery_location_to_be_optional_for_customer_order_table extends Migration
{
    public $tablename = 'customer_order';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn($this->tablename, 'LOCATION_ID', $this->bigInteger(20));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       return true;
    }
}
