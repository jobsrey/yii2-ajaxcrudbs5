<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>
use yii\bootstrap5\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL, 'fieldConfig' => ['inputOptions' => ['autocomplete' => 'off']]]); ?>

    <?= "<?php " ?>echo FormGrid::widget([
        'model' => $model,
        'form' => $form,
        'autoGenerateColumns' => true,
        'rows' => [
<?php
foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "            [\n";
        echo "                'attributes' => [\n";
        echo "                    '$attribute' => [\n";
        echo "                        'type' => Form::INPUT_TEXT,\n";
        echo "                        'options' => ['placeholder' => \$model->getAttributeLabel('$attribute')],\n";
        echo "                    ],\n";
        echo "                ],\n";
        echo "            ],\n";
    }
}
?>
        ],
    ]); ?>

    <?='<?php if (!Yii::$app->request->isAjax){ ?>'."\n"?>
        <div class="form-group">
            <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?="<?php } ?>\n"?>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
