<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 23-Oct-17
 * Time: 15:02
 */

namespace app\assetmanager;


use yii\web\AssetBundle;

class WpCartAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $jsOptions = array(//'position' => \yii\web\View::POS_END
    );

    public $css = [
        'css/wpcart/css/custom.css',
    ];
    public $js = [
        //'css/wpcart/js/custom.js',
    ];
}