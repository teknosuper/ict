<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\QuizModel */

$this->title = $dataModel->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Soal & Latihan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = "Bagikan Soal";
\yii\web\YiiAsset::register($this);
\conquer\modal\ModalForm::widget([
    'selector' => '.modal-form',
]);
?>
<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

		    <?= DetailView::widget([
		        'model' => $dataModel,
		        'attributes' => [
		            // 'id',
		            'title',
		            'description:html',
		            [
		                'attribute' => 'teacher_id',
		                'value' => function ($model) {
		                    return $model->quizBelongsToTeachers->full_name;
		                },
		                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
		                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
		            ],
		            [
		                'attribute' => 'subject_id',
		                'value' => function ($model) {
		                    return $model->quizBelongsToMasterSubjectsModel->subjects;
		                },
		                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
		                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
		            ],
		            'status',
		        ],
		    ]) ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        	<a href="/dashboard/quiz/publishclassroom?quiz_id=<?=$dataModel->id;?>" class="btn btn-block btn-danger modal-form"><i class="fa fa-link"></i> Bagikan Soal ke Siswa Kelas</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>


<?php Pjax::begin(); ?>

<div class="col-md-12">
      <!-- Default box -->
      <div class="box  box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Kotak Pencarian Soal</h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">
          <div class="col-md-row">
            <?php echo $this->render('_assign_quiz_search', ['model' => $searchModel]); ?>    
          </div>
        </div>
      </div>
</div>



<div class="col-md-12">

<?= 
ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],    
    'layout' => "{pager}\n{items}\n{summary}",
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_assign_quiz/_list_item',['model' => $model]);

        // or just do some echo
        // return $model->title . ' posted by ' . $model->author;
    },
   'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'nextPageLabel' => 'next',
        'prevPageLabel' => 'previous',
        'maxButtonCount' => 3,
    ],
]); 
?>

 <?php Pjax::end(); ?>

 <div class="col-md-12">

