<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 23-Oct-17
 * Time: 15:02
 */

namespace app\assetmanager;


use yii\web\AssetBundle;

class CustomAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $jsOptions = array(//'position' => \yii\web\View::POS_END
    );

    public $css = [
        //'css/site.css',
        'css/custom-style.css',
        'css/theme/theme.css',
        'css/theme/skins/default.css',
        'css/theme/theme-custom.css',
    ];
    public $js = [
        'js/jquery-browser-mobile/jquery.browser.mobile.js',
        //'js/liquid-meter/liquid.meter.js',
        //'js/theme/theme.js',
        'js/theme/theme.custom.js',
        'js/theme/theme.init.js',
        //'js/dashboard/examples.dashboard.js',
        'js/custom_js.js',
    ];
}