<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use aneeshikmat\yii2\Yii2TimerCountDown\Yii2TimerCountDown;
use pendalf89\filemanager\widgets\TinyMCE;
use pendalf89\filemanager\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\QuizModel */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
  \conquer\modal\ModalForm::widget([
      'selector' => '.modal-form',
  ]);          
?>

<?php $form = ActiveForm::begin(); ?>

<?php 
  $duration = $getQuizById->minutes;
  $quiz_takenAndminutes = date('Y-m-d H:i:s',strtotime("+{$duration} minute",strtotime($getStats['returnData']['quiz_taken'])));
  $now = date('Y-m-d H:i:s');
  $timer = strtotime($quiz_takenAndminutes)-strtotime($now);
  $timer_in_minute = date('i',$timer);
?>
  

  <?= Yii2TimerCountDown::widget([
      'countDownIdSelector' => 'time-down-counter-2',
      'countDownDate' => strtotime("+$timer_in_minute minutes") * 1000,// You most * 1000 to convert time to milisecond
      'countDownResSperator' => ':',
      'addSpanForResult' => false,
      'addSpanForEachNum' => false,
      'countDownOver' => 'Expired',
      'countDownReturnData' => 'from-days',
      'templateStyle' => 0,
      'getTemplateResult' => 0,
      // 'callBack' => $callBackScript
  ]) ?>

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
                    <td><?= $getQuizById->assignQuizModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;?></td>
                  </tr>
                  <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td><?= $getQuizById->assignQuizModelBelongsToQuizModel->quizBelongsToMasterSubjectsModel->subjects;?></td>
                  </tr>
                  <tr>
                    <td>Guru</td>
                    <td>:</td>
                    <td><?= $getQuizById->assignQuizModelBelongsToTeachersModel->full_name;?></td>
                  </tr>
                  <tr>
                    <td>Batas Waktu Mulai</td>
                    <td>:</td>
                    <td><?= $getQuizById->start_time;?></td>
                  </tr>
                  <tr>
                    <td>Batas Waktu Berakhir</td>
                    <td>:</td>
                    <td><?= $getQuizById->end_time;?></td>
                  </tr>
                  <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td><?= $getQuizById->minutes;?> Menit</td>
                  </tr>
                  <tr>
                    <td>Sisa Waktu</td>
                    <td>:</td>
                    <td><span class="badge bg-red"><div id="time-down-counter-2"></div></span></td>
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

  </div>

  <div class="box box-primary box-solid">
    <div class="box-header ui-sortable-handle" style="cursor: move;">
      <i class="fa fa-envelope"></i>
        <h3 class="box-title"><?= $getQuizById->quiz_title;?></h3>
      <!-- /. tools -->
    </div>
    <div class="box-body">
      <?php foreach($getQuizItems['returnData']['data'] as $getQuizItemsData):?>
      <div class="col-md-12">
          <p><b><?= (\yii::$app->request->get('page')) ? \yii::$app->request->get('page') : 1;?>.</b> <?= $getQuizItemsData->text;?></p>
          <p>
            <?php if($getQuizItemsData->quiz_type==\app\models\QuizItemsModel::ESSAY):?>
              <?= $form->field($QuizAnswerForm, 'answer')->widget(TinyMCE::className(), [
                  'clientOptions' => [
                      'menubar' => false,
                      'height' => 500,
                      'image_dimensions' => false,
                      'external_plugins' => [
                          'tiny_mce_wiris'=>'https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce4@7.17.0/plugin.min.js',
                      ],
                      'plugins' => [
                          'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table',
                      ],
                      'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | code | table | contextmenu | paste | searchreplace tiny_mce_wiris_formulaEditor superscript subscript',
                  ],
              ]);

              ?>           
            <?php endif;?>
          </p>
          <p>
            <?php if($getQuizItemsData->quiz_type==\app\models\QuizItemsModel::MULTIPLE_CHOICE):?>
              <?= $form->field($QuizAnswerForm, 'optionItems')
                ->radioList(
                  $getQuizItemsData->generateOptionList(),
                  [
                      'item' => function($index, $label, $name, $checked, $value) {
                        $radio = Html::radio($name, $checked, ['value' => $value,'label'=>$value.'. '.$label]);
                        return "<p>{$radio}</p>";
                      }
                  ]
                )
                ->label(false); 
              ?>            
            <?php endif;?>
          </p>
      </div>
    <?php endforeach;?>
    </div>

    <div class="box-footer clearfix">
	    <a href="<?= \yii\helpers\Url::toRoute(["/student/quiz/preview/{$getQuizById->id}"]);?>">
      		<button type="button" class="btn btn-grey pull-left" style="margin-right: 5px;">
        		<i class="fa fa-eye"></i> Pratinjau Hasil Soal
      		</button>    	
  		</a>
      <?= Html::submitButton(Yii::t('app', 'Jawab Pertanyaan'), ['class' => 'btn btn-primary pull-right']) ?>
    </div>
    <div class="box-footer clearfix text-center">
      <?php 
          echo \yii\widgets\LinkPager::widget([
              'pagination' => $getQuizItems['returnData']['paginationModel'],
          ]);
      ?>
    </div>
  </div>
  
</div>

<?php ActiveForm::end(); ?>