<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterSchoolModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-school-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
