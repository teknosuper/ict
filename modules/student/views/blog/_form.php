<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ELearningItemsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elearning-items-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'elearning_id')->textInput() ?>

    <?= $form->field($model, 'chapter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'elearning_type')->dropDownList([ 'elearning' => 'Elearning', 'blog' => 'Blog', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cover_image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
