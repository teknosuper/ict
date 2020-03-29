<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SimulationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Simulasi Materi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Tambah Simulation'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'title',
            [
                'attribute' => 'file_html',
                'format'=>'raw',
                'value' => function ($model) {
                    return '<iframe src="'.$model->file_html.'"></iframe>';
                },
                'filter' => false,
            ],
            'description:raw',
            [
                'attribute' => 'subjects_plan_id',
                'value' => function ($model) {
                    return ($model->simulationModelBelongsToSubjectsPlanModel) ? $model->simulationModelBelongsToSubjectsPlanModel->chapter : null;
                },
                'filter' => \app\models\SubjectsPlanModel::getSubjectsPlanModelLists(),
                'filterInputOptions' => ['prompt' => 'Pilih Materi Pelajaran', 'class' => 'form-control', 'id' => null]
            ],
            //'created_by',
            //'created_time',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '#',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="fa fa-eye"></span> detail', $url, [
                                                'title' => Yii::t('app', 'view'),
                                                'class'=>'btn btn-success btn-xs modal-form',
                                                'data-size' => 'modal-lg',
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                                'title' => Yii::t('app', 'update'),
                                                'class'=>'btn btn-warning btn-xs modal-form',
                                                'data-size' => 'modal-lg',

                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span> Hapus', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                                'class'=>'btn btn-danger btn-xs modal-form',
                                                'data-method'=>'post',
                                                'data-confirm'=>'Apakah anda yakin akan menghapus data ini ? ',
                                    ]);
                                }
                        ],

                    ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>
