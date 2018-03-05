<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:20
 */

namespace app\api\modules\v1\models;


use app\helpers\APP_UTILS;
use app\model_extended\MENU_ITEM_TYPE;
use app\models\MenuItem;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class MENU_ITEM_MODEL extends MenuItem //implements Linkable
{

    public function fields()
    {
        $fields = parent::fields();

        $fields['CAT_NAME'] = function ($model) {
            /* @var $model MENU_ITEM_MODEL */

            return $model->mENUCAT->MENU_CAT_NAME;
        };

        $fields['SIZES'] = function ($model) {
            /* @var $model MENU_ITEM_MODEL */
            return MENU_ITEM_TYPE::find()
                ->where(['MENU_ITEM_ID' => $model->MENU_ITEM_ID])
                ->andWhere(['AVAILABLE' => 1])
                ->asArray()
                ->all();
        };

        $fields['MENU_ITEM_IMAGE'] = function ($model) {
            /* @var $model MENU_ITEM_MODEL */
            return APP_UTILS::BuildImageUrl($model->MENU_ITEM_IMAGE);
        };


        return $fields;
    }

    /*
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->MENU_ITEM_ID], true),
            'edit' => Url::to(['user/view', 'id' => $this->MENU_ITEM_ID], true),
            'profile' => Url::to(['user/profile/view', 'id' => $this->MENU_ITEM_ID], true),
            'index' => Url::to(['users'], true),
        ];
    }*/
}