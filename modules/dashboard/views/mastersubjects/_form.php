<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterSubjectsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-subjects-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_id')->textInput()->dropDownList(
    	\app\models\MasterSchoolModel::getSchoolList(),
        // $listData, 
        ['prompt'=>'Select...']); 
    ?>
    
    <?= $form->field($model, 'subjects')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
