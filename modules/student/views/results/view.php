<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;   
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Hasil Belajar');
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= \app\models\HelpersClass::getUserDefaultProfilePic();?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= \yii::$app->user->identity->userBelongsToUserType->full_name;?></h3>

              <p class="text-muted text-center"><?= \yii::$app->user->identity->userType;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Semester</b> <a class="pull-right"><?= ($assignClassroomModel->assignClassroomModelBelongsToClassroomsPlanModel) ? $assignClassroomModel->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToMasterSemesterModel->desc : null;?></a>
                </li>
                <li class="list-group-item">
                  <b>Tahun</b> <a class="pull-right"><?= ($assignClassroomModel->assignClassroomModelBelongsToClassroomsPlanModel) ? $assignClassroomModel->assignClassroomModelBelongsToClassroomsPlanModel->year :null;?></a>
                </li>
                <li class="list-group-item">
                  <b>Kelas</b> <a class="pull-right"><?=($assignClassroomModel->assignClassroomModelBelongsToClassroomsPlanModel) ? $assignClassroomModel->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name : null;?></a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">				
				      <!-- Default box -->
				      <div class="box  box-primary box-solid">
				        <div class="box-header with-border">
				          <h3 class="box-title">Nilai Kuis Daring</h3>

				          <div class="box-tools pull-right">

				          </div>
				        </div>
				        <div class="box-body">

				            <?php Pjax::begin(['id' => 'my_pjax']); ?>

				            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


				            <?= GridView::widget([
				                'dataProvider' => $dataProvider,
				                // 'filterModel' => $searchModel,
				                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
				                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
								// 'showPageSummary' => true,
 								// 'showFooter' => true,
				                'pjax' => false, // pjax is set to always true for this demo
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
				                        // 'detailUrl'=>Url::to(['/student/quiz/preview/']),
				                        'detail' => function ($model, $key, $index, $column) {
				                            return Yii::$app->controller->renderPartial('_expand/index', ['model' => $model]);
				                        },
				                        'headerOptions' => ['class' => 'kartik-sheet-style'],
				                        'expandOneOnly' => true,
				                    ],
				                    [
				                        'attribute' => 'quiz_id',
				                        'value' => function ($model) {
				                            return ($model->assignQuizModelBelongsToQuizModel) ? $model->assignQuizModelBelongsToQuizModel->title : null;
				                        },
				                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
				                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
				                    ],				                    
				                    [
				                        'attribute' => 'quiz_model',
				                        'value' => function ($model) {
				                            return ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->quiz_model : null;
				                        },
				                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
				                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
				                    ],				                   				                    
				                    [
				                        'attribute' => 'quiz_type',
				                        'value' => function ($model) {
				                            return ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->quiz_type : null;
				                        },
				                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
				                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
				                    ],				                   				                    
				                    [
				                        'label' => 'Nilai',
				                        'attribute' => 'grade_in_point',
							         	// 'footer' => 80,
				                        'value' => function ($model) {
				                            return ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->grade_point : null;
				                        },
				                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
				                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
				                    ],
				                    // [
				                    //     'class' => 'yii\grid\ActionColumn',
				                    //     'header' => 'Actions',
				                    //     'headerOptions' => ['style' => 'color:#337ab7'],
				                    //     'template' => '{view}',
				                    //     'buttons' => [
				                    //             'view' => function ($url, $model) {
				                    //                 return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
				                    //                             'title' => Yii::t('app', 'view'),
				                    //                 ]);
				                    //             },

				                    //             // 'update' => function ($url, $model) {
				                    //             //     return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
				                    //             //                 'title' => Yii::t('app', 'update'),
				                    //             //                 'class'=>'btn modal-form',
				                    //             //                 'data-size' => 'modal-lg',

				                    //             //     ]);
				                    //             // },
				                    //             // 'delete' => function ($url, $model) {
				                    //             //     return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
				                    //             //                 'title' => Yii::t('app', 'delete'),
				                    //             //                 'class'=>'btn modal-form',
				                    //             //                 'data-size' => 'modal-lg',

				                    //             //     ]);
				                    //             // }
				                    //     ],

				                    // ],
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
			</div>
		</div>
