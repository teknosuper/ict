<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PegawaiCutiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-cuti-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pegawai_id') ?>

    <?= $form->field($model, 'jenis_cuti') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?= $form->field($model, 'tanggal_mulai_cuti') ?>

    <?php // echo $form->field($model, 'tanggal_berakhir_cuti') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
