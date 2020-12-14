<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClassroomTeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hasil Belajar Siswa');
$this->params['breadcrumbs'][] = $this->title;
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

            <?php Pjax::begin(['id' => 'my_pjax']); ?>
    <?php

        echo GridView::widget([
            'dataProvider'=> $dataProvider,
            'filterModel' => $searchModel,
            'headerRowOptions' => ['class' => 'kartik-sheet-style'],
            'filterRowOptions' => ['class' => 'kartik-sheet-style'],
            'pjax' => true, // pjax is set to always true for this demo
            'toolbar' =>  [
                '{export}',
                '{toggleData}',
            ],
            'export' => [
                'fontAwesome' => true
            ],
            'columns' => [
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'width' => '50px',
                    'value' => function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    // uncomment below and comment detail if you need to render via ajax
                    // 'detailUrl'=>Url::to(['/site/book-details']),
                    'detail' => function ($model, $key, $index, $column) {
                        return Yii::$app->controller->renderPartial('_expand/index', ['model' => $model]);
                    },
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
                    'expandOneOnly' => true,
                ],
                [
                    'label' => 'classroom_id',
                    'attribute' => 'classroom_id',
                    'value' => function ($model) {
                        return ($model->assignClassroomTeacherModelBelongsToClassroomsPlanModel) ? $model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name : null;
                    },
                    'filter' => \app\models\AssignClassroomTeacherModel::getClassroomListByTeacher($searchModel->teacher_id),
                    'filterInputOptions' => ['prompt' => 'All Classroom', 'class' => 'form-control', 'id' => null]
                ],                
                [
                    'label' => 'subject_id',
                    'attribute' => 'subject_id',
                    'value' => function ($model) {
                        return ($model->assignClassroomModelBelongsToMasterSubjectsModel) ? $model->assignClassroomModelBelongsToMasterSubjectsModel->subjects : null;
                    },
                    'filter' => \app\models\MasterSubjectsModel::getSubjectsList(),
                    'filterInputOptions' => ['prompt' => 'All Subjects', 'class' => 'form-control', 'id' => null]
                ],                
                [
                    'label' => 'teacher_id',
                    'attribute' => 'teacher_id',
                    'value' => function ($model) {
                        return ($model->assignClassroomModelBelongsToTeachersModel) ? $model->assignClassroomModelBelongsToTeachersModel->full_name : null;
                    },
                    'filter' => \app\models\TeachersModel::getTeachersList(),
                    'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
                ],
                [
                    'label' => 'semester_id',
                    'attribute' => 'semester_id',
                    'value' => function ($model) {
                        return ($model->assignClassroomTeacherModelBelongsToClassroomsPlanModel) ? $model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToMasterSemesterModel->desc : null;
                    },
                    'filter' => \app\models\MasterSemesterModel::getSemesterList(),
                    'filterInputOptions' => ['prompt' => 'All Semester', 'class' => 'form-control', 'id' => null]
                ],
                [
                    'label' => 'year',
                    'attribute' => 'year',
                    'filter' => \app\models\AssignClassroomTeacherModel::getYearList(),
                    'value' => function ($model) {
                        return ($model->assignClassroomTeacherModelBelongsToClassroomsPlanModel) ? $model->assignClassroomTeacherModelBelongsToClassroomsPlanModel->year : null;
                    },
                    'filterInputOptions' => ['prompt' => 'All Year', 'class' => 'form-control', 'id' => null]
                ],
                // 'status',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view}',
                    'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-book"></i> Lihat Hasil Akhir</span>', $url, [
                                            'title' => Yii::t('app', 'Lihat Hasil Akhir'),
                                            // 'class'=>'btn modal-form',
                                            // 'data-size' => 'modal-lg',
                                ]);
                            },

                            // 'update' => function ($url, $model) {
                            //     return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            //                 'title' => Yii::t('app', 'update'),
                            //                 'class'=>'btn modal-form',
                            //                 'data-size' => 'modal-lg',

                            //     ]);
                            // },
                            // 'delete' => function ($url, $model) {
                            //     return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            //                 'title' => Yii::t('app', 'delete'),
                            //                 'class'=>'btn modal-form',
                            //                 'data-size' => 'modal-lg',

                            //     ]);
                            // }
                    ],

                ],
            ],
            'responsive'=>true,
            'toggleDataOptions' => ['minCount' => 10],
            'hover'=>true
        ]);

    ?>
    <?php Pjax::end(); ?>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>
