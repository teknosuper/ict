<?php

use yii\helpers\Html;
use kartik\grid\GridView;   
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Quiz');
$this->params['breadcrumbs'][] = $this->title;
?>

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
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>    
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
        return $this->render('_items/_list_item',['model' => $model,'student_id'=>$student_id]);

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

