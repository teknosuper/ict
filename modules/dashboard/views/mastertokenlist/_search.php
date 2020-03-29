<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\MasterTokenListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-token-list-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'access_token') ?>

    <?= $form->field($model, 'usedTime') ?>

    <?= $form->field($model, 'access_token_status') ?>

    <?= $form->field($model, 'token_type') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'authurl') ?>

    <?php // echo $form->field($model, 'createdTime') ?>

    <?php // echo $form->field($model, 'createdUserId') ?>

    <?php // echo $form->field($model, 'updatedTime') ?>

    <?php // echo $form->field($model, 'updatedUserId') ?>

    <?php // echo $form->field($model, 'deletedTime') ?>

    <?php // echo $form->field($model, 'deletedUserId') ?>

    <?php // echo $form->field($model, 'key') ?>

    <?php // echo $form->field($model, 'error_message') ?>

    <?php // echo $form->field($model, 'next_limit_time') ?>

    <?php // echo $form->field($model, 'quota_remaining') ?>

    <?php // echo $form->field($model, 'is_limit') ?>

    <?php // echo $form->field($model, 'error_code') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
