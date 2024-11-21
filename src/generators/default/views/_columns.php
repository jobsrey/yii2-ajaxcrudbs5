<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap\Modal;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$modelClass = StringHelper::basename($generator->modelClass);
$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
$actionParams = $generator->generateActionParams();

echo "<?php\n";

?>
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
	[
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'<?=substr($actionParams,1)?>'=>$key]);
        },
        'viewOptions' => [
            'role' => 'modal-remote',
            'title' => 'Lihat',
            'data-toggle' => 'tooltip',
            'label' => '<i class="bi bi-eye"></i>',
        ],
        'updateOptions' => [
            'role' => 'modal-remote',
            'title' => 'Update',
            'data-toggle' => 'tooltip',
            'label' => '<i class="bi bi-pencil"></i>',
        ],
        'deleteOptions' => [
            'role' => 'modal-remote',
            'title' => 'Hapus',
            'data-confirm' => false,
            'data-method' => false,
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Anda Yakin?',
            'data-confirm-message' => 'Apakah Anda yakin akan menghapus data ini?',
            'label' => '<i class="bi bi-trash"></i>',
            'class' => 'link-danger',
        ],
		'buttonOptions' => [
            'class' => 'link-secondary',
        ]
    ],
    <?php
    $count = 0;
    foreach ($generator->getColumnNames() as $name) {   
        if ($name=='id'||$name=='created_at'||$name=='updated_at'){
            echo "	[\n";
            echo "		'class'=>'\kartik\grid\DataColumn',\n";
            echo "    	'attribute'=>'" . $name . "',\n";
			echo "     	'sortLinkOptions' => [ \n 'class' => 'link-secondary fw-bold' \n],\n";
            echo "	],\n";
        } else if (++$count < 6) {
            echo "    [\n";
            echo "        'class'=>'\kartik\grid\DataColumn',\n";
            echo "        'attribute'=>'" . $name . "',\n";
			echo "        'sortLinkOptions' => [ \n 'class' => 'link-secondary fw-bold' \n],\n";
            echo "    ],\n";
        } else {
            echo "    [\n";
            echo "       'class'=>'\kartik\grid\DataColumn',\n";
            echo "       'attribute'=>'" . $name . "',\n";
			echo "       'sortLinkOptions' => [ \n 'class' => 'link-secondary fw-bold' \n],\n";
            echo "    ],\n";
        }
    }
    ?>
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'<?=substr($actionParams,1)?>'=>$key]);
        },
        'viewOptions' => [
            'role' => 'modal-remote',
            'title' => 'Lihat',
            'data-toggle' => 'tooltip',
            'label' => '<i class="bi bi-eye"></i>',
            'class' => 'text-primary',
        ],
        'updateOptions' => [
            'role' => 'modal-remote',
            'title' => 'Update',
            'data-toggle' => 'tooltip',
            'label' => '<i class="bi bi-pencil"></i>',
            'class' => 'text-primary',
        ],
        'deleteOptions' => [
            'role' => 'modal-remote',
            'title' => 'Hapus',
            'data-confirm' => false,
            'data-method' => false,
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Anda Yakin?',
            'data-confirm-message' => 'Apakah Anda yakin akan menghapus data ini?',
            'label' => '<i class="bi bi-trash"></i>',
            'class' => 'text-danger',
        ],
    ],
];   