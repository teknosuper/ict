<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $searchModel->simulationModelBelongsToSubjectsPlanModel->chapter;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Simulasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\conquer\modal\ModalForm::widget([
    'selector' => '.modal-form',
]);
?>


<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pilih Materi</h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">


    <?php echo $this->render('_chapter/_search', ['model' => $searchModel]); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>

<div class="spe-title col-md-12">
	<h2>Simulasi <span><?= $searchModel->simulationModelBelongsToSubjectsPlanModel->chapter;?></span></h2>
	<div class="title-line">
		<div class="tl-1"></div>
		<div class="tl-2"></div>
		<div class="tl-3"></div>
	</div>
	<p>Pilih dan Pelajari Kumpulan Simulasi <?= $searchModel->simulationModelBelongsToSubjectsPlanModel->chapter;?></p>
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
                echo $this->render('_chapter/_listItem',[
                    'model'=>$model,
                ]);
            },
        ]) ?>

            </div>
        </div>  
    </div>
</div>
