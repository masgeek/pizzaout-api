<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:13
 */

namespace app\api\modules\v1\models;


use app\model_extended\CUSTOMER_ORDERS;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class CUSTOMER_ORDER_MODEL extends CUSTOMER_ORDERS implements Linkable
{
    public function fields()
    {
        $fields = parent::fields();

        $fields['RIDER'] = function ($model) {
            /* @var $model $this */
            return $model->rIDER != null ? $model->rIDER : [];
        };

        $fields['ADDRESS'] = function ($model) {
            /* @var $model $this */
            return $model->aDDRESS;
        };

        ksort($fields);
        return $fields;
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->ORDER_ID], true),
            'edit' => Url::to(['user/view', 'id' => $this->ORDER_ID], true),
            'profile' => Url::to(['user/profile/view', 'id' => $this->ORDER_ID], true),
            'index' => Url::to(['users'], true),
        ];
    }
}