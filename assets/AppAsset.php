<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'css/bootstrap-datepicker.css',
        'css/main.css',
        'css/jquery.nselect.css',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap',
    ];
    public $js = [
                  'https://kit.fontawesome.com/a4e584b747.js',
                  'js/main.js',
                  'js/jquery.nselect.min.js',   
                  'js/jquery-editable-select.js',           
                  'js/jquery.nselect.min.js',           
                  'js/bootstrap-datepicker.js',           
                  'js/bootstrap-datepicker.ru.min.js',           
               // 'https://code.jquery.com/jquery-3.2.1.slim.min.js',           
                  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',           
                  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',           
            
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
