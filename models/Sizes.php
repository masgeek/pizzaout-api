<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_sizes".
 *
 * @property string $SIZED_ID
 * @property string $SIZE_TYPE
 * @property bool $ACTIVE
 *
 * @property MenuItemType[] $menuItemTypes
 */
class Sizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_sizes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SIZE_TYPE'], 'required'],
            [['ACTIVE'], 'boolean'],
            [['SIZE_TYPE'], 'string', 'max' => 20],
            [['SIZE_TYPE'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SIZED_ID' => 'Sized  ID',
            'SIZE_TYPE' => 'Size  Type',
            'ACTIVE' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItemTypes()
    {
        return $this->hasMany(MenuItemType::className(), ['ITEM_TYPE_SIZE' => 'SIZE_TYPE']);
    }
}
