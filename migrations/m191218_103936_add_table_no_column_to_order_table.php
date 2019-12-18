<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%customer_order}}`.
 */
class m191218_103936_add_table_no_column_to_order_table extends Migration
{
    public $tablename = 'customer_order';
//    public $tablename = '{{%customer_order}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn($this->tablename, 'TABLE_NUMBER', $this->string(15)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn($this->tablename, 'TABLE_NUMBER');
    }
}
