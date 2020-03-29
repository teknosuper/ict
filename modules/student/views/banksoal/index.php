<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Bank Soal Latihan');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pilih Mata Pelajaran</h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>

<div class="col-md-12">
    <div class="row">
    
        <div class="db-2-com db-2-main">
            <div class="db-2-main-com">

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'layout' => '<div class="row">{items}</div>',
            'itemView' => function ($model, $key, $index, $widget) {
                echo $this->render('_listItem',[
                    'model'=>$model,
                ]);
            },
        ]) ?>

            </div>
        </div>  
    </div>
</div>

