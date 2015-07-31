<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/reset.css',
        'css/grid_12.css',
        'css/style.css',
        'css/slider.css',
        'css/googleapisfont.css',
    ];
    public $js = [
        'js/jquery-1.7.min.js',
        'js/jquery.easing.1.3.js',
        'js/cufon-yui.js',
        'js/cufon-replace.js',
        'js/Bilbo_400.font.js',
        'js/tms-0.4.1.js',
        'js/slider.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
