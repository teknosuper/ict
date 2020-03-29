<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\AssignQuizSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin([
        'action' => ['/dashboard/quiz/publish?id='.\yii::$app->request->get('id')],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'subject_id')->textInput()->dropDownList(
            \app\models\MasterSubjectsModel::getSubjectsList(),
            // $listData, 
            ['prompt'=>'Pilih Mata Pelajaran']); 
        ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'classroom_id')->textInput()->dropDownList(
            \app\models\ClassroomsPlanModel::getClassromPlanListByQuizId(\yii::$app->request->get('id')),
            // $listData, 
            ['prompt'=>'Pilih Kelas']); 
        ?>
    </div>
    <div class="col-md-12 text-center">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-block']) ?>
        </div>      
    </div>
    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'classroom_id') ?>

    <?php // $form->field($model, 'quiz_id') ?>

    <?php // $form->field($model, 'quiz_type') ?>

    <?php // $form->field($model, 'start_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <?php // echo $form->field($model, 'instruction') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'minutes') ?>

    <?php // echo $form->field($model, 'enable_pause') ?>


    <?php // echo $form->field($model, 'quiz_title') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php ActiveForm::end(); ?>

</div>