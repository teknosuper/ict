<?php if($model):?>
	<div class="row">		
            <div class="col-md-12">
	          	<div class="box box-primary box-solid">
		            <div class="box-header">
		              	<h3 class="box-title"><i class="fa fa-file-text-o"></i> <?=$model->quiz_title;?></h3>
		            </div>
			            <!-- /.box-header -->
			            <div class="box-body no-padding">
			              	<table class="table table-condensed">
			                	<tbody>
			                  		<tr>
			                    		<td>Kelas</td>
			                    		<td>:</td>
			                    		<td><?= $model->assignQuizModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;?></td>
			                  		</tr>
			                  		<tr>
			                    		<td>Sekolah</td>
			                    		<td>:</td>
			                    		<td><?= $model->assignQuizModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroomsBelongsToSchool->school_name;?></td>
			                  		</tr>
				                  	<tr>
				                    	<td>Mata Pelajaran</td>
				                    	<td>:</td>
				                    	<td><?= ($model->assignQuizModelBelongsToQuizModel) ? $model->assignQuizModelBelongsToQuizModel->quizBelongsToMasterSubjectsModel->subjects : null;?></td>
				                  	</tr>
				                  	<tr>
				                    	<td>Semester</td>
				                    	<td>:</td>
				                    	<td><?= $model->assignQuizModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToMasterSemesterModel->desc;?></td>
				                  	</tr>
				                  	<tr>
				                    	<td>Guru</td>
				                    	<td>:</td>
				                    	<td><?= $model->assignQuizModelBelongsToTeachersModel->full_name;?></td>
				                  	</tr>
				                  	<tr>
				                    	<td>Batas Waktu Mulai</td>
				                    	<td>:</td>
				                    	<td><?= $model->start_time;?></td>
				                  	</tr>
				                  	<tr>
				                    	<td>Batas Waktu Berakhir</td>
				                    	<td>:</td>
				                   		<td><?= $model->end_time;?></td>
				                  	</tr>
				                  	<tr>
				                    	<td>Durasi</td>
				                    	<td>:</td>
				                   		<td><?= $model->minutes;?> Menit</td>
				                  	</tr>
				                  	<tr>
				                    	<td>Status</td>
				                    	<td>:</td>
				                    	<td><?= ($model->assignQuizModelBelongsToQuizResultsModel) ? $model->assignQuizModelBelongsToQuizResultsModel->statusDetail : null;?></td>
				                  	</tr>
			                	</tbody>
			              	</table>
			            </div>
			            <!-- /.box-body -->
			            <div class="box-footer">
			            	<a href="/student/quiz/preview/<?=$model->id;?>" class="btn btn-block btn-success">Kerjakan Soal</a>
			            </div>
	          	</div>
            </div>
	</div>

<?php endif;?>