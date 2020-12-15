<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AssignClassroomTeacherModel */

$this->title = "Hasil Nilai Akhir Kelas : ".$model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kelas Saya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-md-12">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'classroom_id',
                'value' => function ($model) {
                    return $model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'teacher_id',
                'value' => function ($model) {
                    return $model->assignClassroomModelBelongsToTeachersModel->full_name;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'subject_id',
                'value' => function ($model) {
                    return $model->assignClassroomModelBelongsToMasterSubjectsModel->subjects;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'semester_id',
                'value' => function ($model) {
                    return $model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToMasterSemesterModel->desc;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'semester_id',
                'value' => function ($model) {
                    return $model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->currentYear;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            // 'status',
        ],
    ]) ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>
