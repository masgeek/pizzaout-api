<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assetmanager;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BowerAsset extends AssetBundle
{

    public $sourcePath = '@bower';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
        'bootstrap-multiselect/dist/css/bootstrap-multiselect.css',
        'nanoscroller/bin/css/nanoscroller.css',
        'magnific-popup/dist/magnific-popup.css',
        'animate.css/animate.min.css',
        //'tingle/dist/tingle.min.css'
    ];
    public $publishOptions = [
        //'forceCopy'=>true,
    ];
    public $js = [
        'modernizer/modernizr.js',
        'bootstrap-multiselect/dist/js/bootstrap-multiselect.js',
        'magnific-popup/dist/jquery.magnific-popup.js',
        'nanoscroller/bin/javascripts/jquery.nanoscroller.js',
        //'flot/jquery.flot.js',
        //'flot.tooltip/js/jquery.flot.tooltip.js',
        //'flot/jquery.flot.pie.js',
        //'flot/jquery.flot.categories.js',
        //'flot/jquery.flot.resize.js',
        //'easypiechart/dist/jquery.easypiechart.js',
        //'jqvmap/dist/jquery.vmap.js',
        //'jqvmap/dist/maps/jquery.vmap.world.js',
        //'jqvmap/dist/maps/continents/jquery.vmap.africa.js',
        //'jqvmap/dist/maps/continents/jquery.vmap.asia.js',
        //'jqvmap/dist/maps/continents/jquery.vmap.australia.js',
        //'jqvmap/dist/maps/continents/jquery.vmap.europe.js',
        //'jqvmap/dist/maps/continents/jquery.vmap.north-america.js',
        //'jqvmap/dist/maps/continents/jquery.vmap.south-america.js',
        //'jqvmap/examples/js/jquery.vmap.sampledata.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
