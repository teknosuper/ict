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
				        			<th class="bg-red text-center"><?= floor((ceil($lksResultsAverage)+ceil($kuisResultsAverage))/2);?></th>
				        		</tr>
				        	</table>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>        