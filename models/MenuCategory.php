<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_category".
 *
 * @property int $MENU_CAT_ID
 * @property string $MENU_CAT_NAME
 * @property int $MAX_QTY Show the maximum number of quantities one can select from
 * @property string $MENU_CAT_IMAGE
 * @property int $ACTIVE
 * @property int $RANK
 *
 * @property MenuItem[] $menuItems
 */
class MenuCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MENU_CAT_NAME', 'RANK'], 'required'],
            [['MAX_QTY', 'ACTIVE', 'RANK'], 'integer'],
            [['MENU_CAT_NAME'], 'string', 'max' => 50],
            [['MENU_CAT_IMAGE'], 'string', 'max' => 255],
            [['MENU_CAT_NAME'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MENU_CAT_ID' => 'Menu  Cat  ID',
            'MENU_CAT_NAME' => 'Menu  Cat  Name',
            'MAX_QTY' => 'Show the maximum number of quantities one can select from',
            'MENU_CAT_IMAGE' => 'Menu  Cat  Image',
            'ACTIVE' => 'Active',
            'RANK' => 'Rank',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItems()
    {
        return $this->hasMany(MenuItem::className(), ['MENU_CAT_ID' => 'MENU_CAT_ID']);
    }
}
