<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%payment}}`.
 */
class m191218_165220_add_payment_and_change_columns_to_payment_table extends Migration
{
    public $tableName = 'payment';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->alterColumn($this->tableName, 'PAYMENT_DATE', $this->integer(11));
        $this->alterColumn($this->tableName, 'PAYMENT_NUMBER', $this->string(30));
        $this->alterColumn($this->tableName, 'ORDER_ID', $this->bigInteger(20)->notNull());

        $this->addColumn($this->tableName, 'AMOUNT_RECEIVED', $this->float(2)->notNull());
        $this->addColumn($this->tableName, 'CHANGE_DUE', $this->float(2)->notNull());
        $this->addColumn($this->tableName, 'UPDATED_AT', $this->integer(11));
        $this->addColumn($this->tableName, 'CREATED_BY', $this->bigInteger(20));
        $this->addColumn($this->tableName, 'UPDATED_BY', $this->bigInteger(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'AMOUNT_RECEIVED');
        $this->dropColumn($this->tableName, 'CHANGE_DUE');
        $this->dropColumn($this->tableName, 'UPDATED_AT');
        $this->dropColumn($this->tableName, 'CREATED_BY');
        $this->dropColumn($this->tableName, 'UPDATED_BY');
    }
}
