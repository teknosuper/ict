<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClassroomTeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hasil Belajar Siswa'), 'url' => ['index']];
$this->title = Yii::t('app', 'Nilai Siswa');
$this->params['breadcrumbs'][] = $this->title;
?>


		<div class="col-md-12">
		      <!-- Default box -->
		  	<div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Daftar Nilai Siswa</h3>

		          <div class="box-tools pull-right">
				        <?= Html::a(Yii::t('app', 'Tambah Data Nilai'), ['create'], ['class' => 'btn btn-success']) ?>
		          </div>
		        </div>
		        <div class="box-body" style="overflow-x: scroll;">

				    <?= GridView::widget([
				        'dataProvider' => $dataProvider,
				        'filterModel' => $searchModel,
				        'columns' => [
				            // ['class' => 'yii\grid\SerialColumn'],

				            // 'id',
				            // 'student_id',
		                    [
		                        'attribute' => 'quiz_id',
		                        'value' => function ($model) {
		                        	switch ($model->quiz_model) {
		                        		case 1:
		                        			return $model->quizResultsBelongsToAssignQuiz->assignQuizModelBelongsToQuizModel->title;
		                        			# code...
		                        			break;
		                        		
		                        		default:
		                        			return $model->quizResultsBelongsToQuizModel->title;
		                        			# code...
		                        			break;
		                        	}
		                        },
		                        'filter' => FALSE,
		                        'filterInputOptions' => ['prompt' => 'Semua Soal', 'class' => 'form-control', 'id' => null]
		                    ],		                    
		                    [
		                        'attribute' => 'quiz_model',
		                        'value' => function ($model) {
		                            return $model->quizModelDetail;
		                        },
		                        'filter' => FALSE,
		                        'filterInputOptions' => ['prompt' => 'Semua Soal', 'class' => 'form-control', 'id' => null]
		                    ],
		                    [
		                        'attribute' => 'quiz_type',
		                        'value' => function ($model) {
		                            return $model->quizFormulaText;
		                        },
		                        'filter' => FALSE,
		                        'filterInputOptions' => ['prompt' => 'Semua Soal', 'class' => 'form-control', 'id' => null]
		                    ],

				            // 'quiz_taken',
				            // 'quiz_finish',
				            // 'quiz_model',
				            // 'quiz_type',
		                    [
		                        'attribute' => 'status',
		                        'value' => function ($model) {
		                            return $model->statusDetail;
		                        },
		                        'format'=>'html',
		                        'filter' => FALSE,
		                        'filterInputOptions' => ['prompt' => 'Semua Soal', 'class' => 'form-control', 'id' => null]
		                    ],
				            'grade_point',

				            ['class' => 'yii\grid\ActionColumn'],
				        ],
				    ]); ?>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">				
				      <!-- Default box -->
			      	<div class="box  box-primary box-solid">
				        <div class="box-header with-border">
				          <h3 class="box-title">Nilai Kuis Luring</h3>
				        </div>
				        <div class="box-body">
			          		<table class="table table-bordered">
				          		<?php if($offlineResults):?>
				          				<tr>
				          					<th>Soal</th>
				          					<th>Model</th>
				          					<th>Tipe Soal</th>
				          					<th>Nilai</th>
				          				</tr>
									<?php foreach($offlineResults as $offlineResultsData):?>
					          			<tr>
					          				<td><?= ($offlineResultsData->quizResultsBelongsToQuizModel) ? $offlineResultsData->quizResultsBelongsToQuizModel->title : null;?> </td>
					          				<td><?= $offlineResultsData->quizModelDetail;?></td>
					          				<td><?= $offlineResultsData->quizFormulaText;?></td>
					          				<td><?= $offlineResultsData->grade_point;?></td>
					          			</tr>
					          		<?php endforeach;?>
					          	<?php endif;?>
			          		</table>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>


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
				                            return ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->quizModelDetail : null;
				                        },
				                        // 'filter' => \app\models\TeachersModel::getTeachersList(),
				                        'filterInputOptions' => ['prompt' => 'All Teachers', 'class' => 'form-control', 'id' => null]
				                    ],				                   				                    
				                    [
				                        'attribute' => 'quiz_type',
				                        'value' => function ($model) {
				                            return ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->quizFormulaText : null;
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


		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">				
				      <!-- Default box -->
			      	<div class="box  box-primary box-solid">
				        <div class="box-header with-border">
				          <h3 class="box-title">Nilai Kuis Luring</h3>
				        </div>
				        <div class="box-body">
			          		<table class="table table-bordered">
				          		<?php if($offlineResults):?>
				          				<tr>
				          					<th>Soal</th>
				          					<th>Model</th>
				          					<th>Tipe Soal</th>
				          					<th>Nilai</th>
				          				</tr>
									<?php foreach($offlineResults as $offlineResultsData):?>
					          			<tr>
					          				<td><?= ($offlineResultsData->quizResultsBelongsToQuizModel) ? $offlineResultsData->quizResultsBelongsToQuizModel->title : null;?> </td>
					          				<td><?= $offlineResultsData->quizModelDetail;?></td>
					          				<td><?= $offlineResultsData->quizFormulaText;?></td>
					          				<td><?= $offlineResultsData->grade_point;?></td>
					          			</tr>
					          		<?php endforeach;?>
					          	<?php endif;?>
			          		</table>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>


		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">				
				      <!-- Default box -->
			      	<div class="box  box-primary box-solid">
				        <div class="box-header with-border">
				          <h3 class="box-title">Nilai Akhir</h3>

				          <div class="box-tools pull-right">

				          </div>
				        </div>
				        <div class="box-body">
				        	<table class="table table-bordered">
				        		<tr>
				        			<th>Tipe Soal</th>
				        			<th>Rata-Rata Nilai</th>
				        		</tr>
				        		<tr>
				        			<td>Lembar Kerja Siswa (50%)</td>
				        			<td class=" text-center"><?= ($lksResultsAverage) ? ceil($lksResultsAverage) : 0;?></td>
				        		</tr>
				        		<tr>
				        			<td>Kuis (50%)</td>
				        			<td class=" text-center"><?= ($kuisResultsAverage) ? ceil($kuisResultsAverage) : 0;?></td>
				        		</tr>
				        		<tr>
				        			<th class=" text-center">Nilai Akhir</th>
				        			<th class="bg-red text-center"><?= ceil((ceil($lksResultsAverage)+ceil($kuisResultsAverage))/2);?></th>
				        		</tr>
				        	</table>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>        