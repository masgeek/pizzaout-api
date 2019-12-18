<?php

use yii\db\Migration;

/**
 * Class m191218_175111_add_order_id_foreign_key_to_payment_table
 */
class m191218_175111_add_order_id_foreign_key_to_payment_table extends Migration
{
    public $tableName = 'payment';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-order-id', $this->tableName, 'ORDER_ID', 'customer_order', 'ORDER_ID', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order-id', $this->tableName);

    }
}
