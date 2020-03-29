<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ELearningItemsModelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elearning-items-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'chapter') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'elearning_type') ?>

    <?php // echo $form->field($model, 'cover_image') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-search"></i> Cari'), ['class' => 'btn btn-block btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
