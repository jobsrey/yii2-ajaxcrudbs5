<?php

namespace jobsrey\ajaxcrud;

use yii\web\AssetBundle;

class CrudAsset extends AssetBundle
{
    public $sourcePath = '@jobsrey/assets';

    public $css = [
        'ajaxcrud.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        'kartik\grid\GridViewAsset',
    ];

    public function init()
    {
        $this->js = [
            'ModalRemote.js',
            'ajaxcrud.js',
        ];

        parent::init();
    }
}
