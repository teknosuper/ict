<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker

/* @var $this yii\web\View */
/* @var $model app\models\AssignQuizModel */
/* @var $form ActiveForm */
?>

<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Bagikan Kelas</h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

		    <?php $form = ActiveForm::begin(); ?>

		        <?= $form->field($model, 'classroom_id')->textInput()->dropDownList(
		            \app\models\ClassroomsPlanModel::getClassromPlanListByAssignClassroomTeacher($quizModel->teacher_id),
		            // $listData, 
		            ['prompt'=>'Pilih Kelas']); 
		        ?>

		        <?= $form->field($model, 'quiz_type')->textInput()->dropDownList(
		            \app\models\ClassroomsPlanModel::getClassromPlanListByAssignClassroomTeacher($quizModel->teacher_id),
		            // $listData, 
		            ['prompt'=>'Pilih Kelas']); 
		        ?>

		        <?= $form->field($model, 'minutes') ?>
		        <?php 
					echo $form->field($model, 'start_time')->widget(DateTimePicker::classname(), [
						'options' => ['placeholder' => 'Masukan Batas Waktu Mulai ...','autocomplete'=>'off'],
						'pluginOptions' => [
							'autoclose' => true
						]
					]);
		        ?>
		        <?php 
					echo $form->field($model, 'end_time')->widget(DateTimePicker::classname(), [
						'options' => ['placeholder' => 'Masukan Batas Waktu Berakhir ...','autocomplete'=>'off'],
						'pluginOptions' => [
							'autoclose' => true
						]
					]);
		        ?>
		        <?= $form->field($model, 'quiz_title') ?>
		    
		        <div class="form-group">
		            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
		        </div>
		    <?php ActiveForm::end(); ?>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>
