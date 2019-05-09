<?php

namespace app\modules\cashsale;

/**
 * cash-sale module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\cashsale\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->layoutPath = \Yii::getAlias('@app/themes/porto_theme/layouts/');
        $this->layout = 'customer_layout';
    }
}
