<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningItemsModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tahukah Kamu ? ');
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php Pjax::begin(); ?>
      
      <?php /*

        <div class="col-md-12">
              <!-- Default box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Pencarian "Tahukah Kamu ?"</h3>

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

        */ ?>

        <div class="spe-title col-md-12">
            <h2><span>Tahukah Kamu ?</span></h2>
            <div class="title-line">
                <div class="tl-1"></div>
                <div class="tl-2"></div>
                <div class="tl-3"></div>
            </div>
            <p>Tahukah Kamu ? adalah halaman dimana Siswa dapat membaca berbagai informasi kejadian sehari-hari dari materi pelajaran yang diunggah oleh guru</p>
        </div>

        <div class="col-md-12">
            <div class="row">
            
                <div class="db-2-com db-2-main">
                    <div class="db-2-main-com">

                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'item'],
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

    <?php Pjax::end(); ?>
