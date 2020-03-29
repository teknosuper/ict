<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ScriptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="script-class-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'master_script_name') ?>

    <?= $form->field($model, 'master_script_slug') ?>

    <?= $form->field($model, 'master_script_by_tag_location') ?>

    <?= $form->field($model, 'master_script_by_tag_location_position') ?>

    <?php // echo $form->field($model, 'master_script_hostname_id') ?>

    <?php // echo $form->field($model, 'master_script_code') ?>

    <?php // echo $form->field($model, 'master_script_order') ?>

    <?php // echo $form->field($model, 'master_script_status') ?>

    <?php // echo $form->field($model, 'master_script_platform_type') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
