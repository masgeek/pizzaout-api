<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%customer_order}}`.
 */
class m191218_134716_add_blamable_column_to_customer_order_table extends Migration
{
    public $tablename = 'customer_order';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn($this->tablename, 'ORDERED_BY', $this->bigInteger(20));
        $this->addColumn($this->tablename, 'UPDATED_BY', $this->bigInteger(20));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn($this->tablename, 'ORDERED_BY');
        $this->dropColumn($this->tablename, 'UPDATED_BY');
    }
}
