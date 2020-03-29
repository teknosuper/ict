<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClassroomsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classrooms-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_id')->textInput()->dropDownList(
    	\app\models\MasterSchoolModel::getSchoolList(),
        // $listData, 
        ['prompt'=>'Select...']); 
    ?>

    <?= $form->field($model, 'classroom_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'classroom_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
