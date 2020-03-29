<?php

use yii\helpers\Html;
use kartik\grid\GridView;   
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Hasil Belajar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
      <!-- Default box -->
      <div class="box  box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Hasil Belajar <b class="label label-success"><?= \yii::$app->user->identity->userBelongsToUserType->full_name;?></b></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                'responsive'=>false,
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
                            // return Yii::$app->controller->renderPartial('_expand/index', ['model' => $model]);
                        },
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'expandOneOnly' => true,
                    ],

                    // 'id',
                    [
                        // 'label' => 'classroom_id',
                        'attribute' => 'classroom_id',
                        'value' => function ($model) {
                            return ($model->assignClassroomModelBelongsToClassroomsPlanModel) ? $model->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name : null;
                        },
                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
                    ],
                    [
                        // 'label' => 'year',
                        'attribute' => 'year',
                        'value' => function ($model) {
                            return ($model->assignClassroomModelBelongsToClassroomsPlanModel) ? $model->assignClassroomModelBelongsToClassroomsPlanModel->year : null;
                        },
                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
                    ],
                    [
                        // 'label' => 'semester',
                        'attribute' => 'semester',
                        'value' => function ($model) {
                            return ($model->assignClassroomModelBelongsToClassroomsPlanModel) ? $model->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToMasterSemesterModel->desc : null;
                        },
                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
                    ],
                    [
                        // 'label' => 'school_id',
                        'attribute' => 'school_id',
                        'value' => function ($model) {
                            return ($model->assignClassroomModelBelongsToClassroomsPlanModel) ? $model->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroomsBelongsToSchool->school_name : null;
                        },
                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
                    ],
                    'status',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{view}',
                        'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
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
            ]); ?>
            <?php Pjax::end(); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>
