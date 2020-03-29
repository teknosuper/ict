<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuizResultsAnswerModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-results-answer-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quiz_result_id')->textInput() ?>

    <?= $form->field($model, 'quiz_item_id')->textInput() ?>

    <?= $form->field($model, 'option')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
