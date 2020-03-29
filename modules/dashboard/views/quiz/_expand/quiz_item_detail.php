<?php
	use yii\helpers\Html;
	\conquer\modal\ModalForm::widget([
	    'selector' => '.modal-form',
	]);

?>

<?php if($model->quiz_type==\app\models\QuizItemsModel::ESSAY):?>

<?php else:?>


<div class="box">
            <div class="box-header text-center">
            <?= Html::a(Yii::t('app', 'Tambah Pilihan Jawaban Biasa'), ['/dashboard/quizitemsoptions/create','quiz_item_id'=>$model->id], ['class' => 'btn btn-success modal-form','data-size' => 'modal-lg']) ?>
            <?= Html::a(Yii::t('app', 'Tambah Pilihan Jawaban + Equation'), ['/dashboard/quizitemsoptions/create','quiz_item_id'=>$model->id,'equation'=>1], ['class' => 'btn btn-success']) ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-condensed">
                <tbody>
              <tr>
                  <th>Pilihan Jawaban</th>
                  <th>Jawaban Benar</th>
                  <th>#</th>
                </tr>
  <?php if($model->quizItemsHasManyQuizItemsOptions):?>
    <?php foreach($model->quizItemsHasManyQuizItemsOptions as $options):?>
                <tr>
                  <td><?= $options->option;?>. <?= $options->value;?></td>
                  <td><?= $options->isCorrectAnswerListDetail;?></td>
                  <td class="text-right">
              <?= Html::a(Yii::t('app', 'Update'), ['/dashboard/quizitemsoptions/update','id'=>$options->id], ['class' => 'btn btn-default modal-form','data-size' => 'modal-lg']) ?>
              <?= Html::a(Yii::t('app', 'Update Equation'), ['/dashboard/quizitemsoptions/update','id'=>$options->id,'equation'=>1], ['class' => 'btn btn-default']) ?>
                          <?= Html::a(Yii::t('app', 'Hapus Jawaban'), ['/dashboard/quizitemsoptions/delete','id'=>$options->id], ['class' => 'btn btn-danger modal-form','data-size' => 'modal-lg','data' => ['confirm' => 'Apakah anda yakin akan menghapus Soal?'],]) ?>                    
                  </td>
                </tr>
      <?php endforeach;?>
  <?php else:?>
    <b>Belum ada pilihan jawaban</b>

  <?php endif;?>
              </tbody>
          </table>
            </div>
            <!-- /.box-body -->
          </div>

<?php endif;?>
