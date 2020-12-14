<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">Daftar Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>#</th>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Kelas</th>
                  <th>Sekolah</th>
                  <th>Semester</th>
                  <th>Year</th>
                  <th>#</th>
                </tr>
                <?php if($model->assignClassroomTeacherModelHasManyAssignClassroomModel):?>
                	<?php $i=1;?>
					<?php foreach($model->assignClassroomTeacherModelHasManyAssignClassroomModel as $models):?>
	                <tr>	                
	                	<td><?= $i++;?></td>
	                  	<td><?= $models->assignClassroomModelBelongsToStudentsModel->full_name?></td>
	                  	<td><?php // ($models->assignClassroomModelBelongsToAssignSchoolModel) ? $models->assignClassroomModelBelongsToAssignSchoolModel->nis : null;?></td>
	                  	<td><?= $models->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;?></td>
	                  	<td><?= $models->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroomsBelongsToSchool->school_name;?></td>
	                  	<td><?= $models->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToMasterSemesterModel->desc;?></td>
	                  	<td><?= $models->assignClassroomModelBelongsToClassroomsPlanModel->year;?></td>
                      <td><a data-pjax="0" href="<?= \yii\helpers\Url::toRoute(['/dashboard/results/student','student_id'=>$models->assignClassroomModelBelongsToStudentsModel->id]);?>" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Lihat Hasil Belajar</a></td>
	                </tr>
		            <?php endforeach;?>
	            <?php endif;?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>