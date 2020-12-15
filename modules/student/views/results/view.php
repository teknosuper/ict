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
				        </div>
				        <div class="box-body">
			          		<table class="table table-bordered">
				          		<?php if($onlineResults):?>
				          				<tr>
				          					<th>Soal</th>
				          					<th>Model</th>
				          					<th>Tipe Soal</th>
				          					<th>Nilai</th>
				          				</tr>
									<?php foreach($onlineResults as $onlineResultsData):?>
					          			<tr>
					          				<td><?= ($onlineResultsData->quizResultsBelongsToQuizModel) ? $onlineResultsData->quizResultsBelongsToQuizModel->title : null;?> </td>
					          				<td><?= $onlineResultsData->quizModelDetail;?></td>
					          				<td><?= $onlineResultsData->quizFormulaText;?></td>
					          				<td><?= $onlineResultsData->grade_point;?></td>
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