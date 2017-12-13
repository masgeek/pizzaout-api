<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/28/2017
 * Time: 3:33 PM
 */

namespace app\assetmanager;


use yii\web\AssetBundle;

class YarnAssets extends AssetBundle
{
	public $basePath = '@webroot/node_modules';
	public $baseUrl = '@web/node_modules';

	public $jsOptions = array(
		'position' => \yii\web\View::POS_HEAD
	);
	public $css = [
		'bootstrap-multiselect/dist/css/bootstrap-multiselect.css',
		'nanoscroller/bin/css/nanoscroller.css',
		'magnific-popup/dist/magnific-popup.css',
	];
	public $publishOptions = [
		//'forceCopy'=>true,
	];

	public $js = [
		/*'modernizr/bin/modernizr',
		'bootstrap-multiselect/dist/js/bootstrap-multiselect.js',
		'magnific-popup/dist/jquery.magnific-popup.js',
		'nanoscroller/bin/javascripts/jquery.nanoscroller.js',
		'flot/jquery.flot.js',
		'jquery.flot.tooltip/js/jquery.flot.tooltip.js',
		'flot/jquery.flot.pie.js',
		'flot/jquery.flot.categories.js',
		'flot/jquery.flot.resize.js',
		'easy-pie-chart/dist/jquery.easypiechart.js',
		'jqvmap/dist/jquery.vmap.js',
		'jqvmap/dist/maps/jquery.vmap.world.js',
		'jqvmap/dist/maps/continents/jquery.vmap.africa.js',
		'jqvmap/dist/maps/continents/jquery.vmap.asia.js',
		'jqvmap/dist/maps/continents/jquery.vmap.australia.js',
		'jqvmap/dist/maps/continents/jquery.vmap.europe.js',
		'jqvmap/dist/maps/continents/jquery.vmap.north-america.js',
		'jqvmap/dist/maps/continents/jquery.vmap.south-america.js',
		'jqvmap/examples/js/jquery.vmap.sampledata.js',*/
	];

	public $depends = [
		'yii\web\JqueryAsset',
	];
}