<?php
  use \yii\helpers\Html;
?>
<div class="col-md-12">

  <div class="row">

    <div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header">
              <h3 class="box-title">Informasi Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->assignQuizModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;?></td>
                  </tr>
                  <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->assignQuizModelBelongsToQuizModel->quizBelongsToMasterSubjectsModel->subjects;?></td>
                  </tr>
                  <tr>
                    <td>Guru</td>
                    <td>:</td>
                    <td><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->assignQuizModelBelongsToTeachersModel->full_name;?></td>
                  </tr>
                  <tr>
                    <td>Batas Waktu Mulai</td>
                    <td>:</td>
                    <td><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->start_time;?></td>
                  </tr>
                  <tr>
                    <td>Batas Waktu Berakhir</td>
                    <td>:</td>
                    <td><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->end_time;?></td>
                  </tr>
                    <tr>
                      <td>Durasi</td>
                      <td>:</td>
                      <td><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->minutes;?> Menit</td>
                    </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $getQuizResultsByQuizId->statusDetail;?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </div>

    <div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header">
              <h3 class="box-title">Statistik Mengerjakan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <td>Soal Terjawab</td>
                    <td>:</td>
                    <td class="text-right"><span class="badge bg-green"><?=$getStats['returnData']['quiz_total_answered'];?></span></td>
                  </tr>
                  <tr>
                    <td>Soal Tidak Terjawab</td>
                    <td>:</td>
                    <td class="text-right"><span class="badge bg-red"><b><?=$getStats['returnData']['quiz_total_unanswered'];?></span></td>
                  </tr>
                  <tr>
                    <td>Total Soal</td>
                    <td>:</td>
                    <td class="text-right"><span class="badge bg-green"><?=$getStats['returnData']['quiz_total_questions'];?></span></td>
                  </tr>
                  <tr>
                    <td>Waktu Mulai Mengerjakan</td>
                    <td>:</td>
                    <td class="text-right"><span class="badge bg-red"><?=$getStats['returnData']['quiz_taken'];?></span></td>
                  </tr>
                  <tr>
                    <td>Waktu Terakhir Mengerjakan</td>
                    <td>:</td>
                    <td class="text-right"><span class="badge bg-red"><?=$getStats['returnData']['quiz_finish'];?></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </div>

    <?php if($getQuizResultsByQuizId->status == 2 or $getQuizResultsByQuizId->status == 3):?>
      <div class="col-md-12">
          <a href="/student/results" class="btn btn-primary btn-block"><i class="fa fa-book"></i> Lihat Nilai</a>
      </div>
    <?php endif;?>
  </div>
</div>

<?php 
  switch ($getQuizResultsByQuizId->status) {
    case 0:
    case 1:
      echo \Yii::$app->controller->renderPartial('_detail/index', ['getQuizResultsByQuizId' => $getQuizResultsByQuizId]);
      # code...
      break;
    
    default:
      # code...
      break;
  }
?>
