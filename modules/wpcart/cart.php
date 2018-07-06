<?php

namespace app\modules\wpcart;

/**
 * wpcart module definition class
 */
class cart extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\wpcart\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        //set custom theme for the customer module
        $this->layoutPath = \Yii::getAlias('@app/themes/porto_theme/layouts/');
        $this->layout = 'wp_cart';
    }
}
