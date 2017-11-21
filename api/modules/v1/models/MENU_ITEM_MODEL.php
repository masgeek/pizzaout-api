<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:20
 */

namespace app\api\modules\v1\models;


use app\model_extended\MENU_ITEM_TYPE;
use app\models\MenuItem;
use yii\helpers\Url;

class MENU_ITEM_MODEL extends MenuItem
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
                ->all();
        };

        $fields['MENU_ITEM_IMAGE'] = function ($model) {
            /* @var $model MENU_ITEM_MODEL */

            $baseUrl = Url::to('@foodimages', true);
            //$baseUrl = Url::to('@webroot', false);
            $imagePath = "{$baseUrl}/{$model->MENU_ITEM_IMAGE}";
            return $imagePath;
        };


        return $fields;
    }
}