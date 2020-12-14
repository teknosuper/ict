<?php
namespace app\template\adminlte\assets;

use yii\base\Exception;
use yii\web\AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class Assets extends AssetBundle
{
    // public $sourcePath = '@resources/lte/dist';
    public $css = [
        // 'css/AdminLTE.min.css',
    ];
    public $js = [
        // 'js/app.min.js',
    ];
    public $depends = [
        // 'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];


    public $skin = '_all-skins';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // if(YII_DEBUG)
        // {
        //     $this->publishOptions['forceCopy'] = true;
        // }
        parent::init();
    }
}
