<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="script-class-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'master_script_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'master_script_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'master_script_by_tag_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'master_script_by_tag_location_position')->dropDownList([ 'top' => 'Top', 'bottom' => 'Bottom', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'master_script_hostname_id')->textInput() ?>

    <?= $form->field($model, 'master_script_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'master_script_order')->textInput() ?>

    <?= $form->field($model, 'master_script_status')->textInput() ?>

    <?= $form->field($model, 'master_script_platform_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'updated_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
