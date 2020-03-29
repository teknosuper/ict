<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\QuizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Soal & Latihan');
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
                <?= Html::a(Yii::t('app', 'Tambah Kuis Baru'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                'responsive'=>false,
                'toolbar' =>  [
                    '{export}',
                    '{toggleData}',
                ],
                'export' => [
                    'fontAwesome' => true
                ],                
                'columns' => [
                    [
                        'class' => 'kartik\grid\ExpandRowColumn',
                        'width' => '50px',
                        'value' => function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        // uncomment below and comment detail if you need to render via ajax
                        // 'detailUrl'=>Url::to(['/site/book-details']),
                        'detail' => function ($model, $key, $index, $column) {
                            return Yii::$app->controller->renderPartial('_expand/index', ['model' => $model]);
                        },
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'expandOneOnly' => true,
                    ],

                    // 'id',
                    'title',
                    // 'subject_id',
                    [
                        'attribute' => 'subject_id',
                        'value' => function ($model) {
                            return ($model->quizBelongsToMasterSubjectsModel) ? $model->quizBelongsToMasterSubjectsModel->subjects : null;
                        },
                        'filter' => \app\models\MasterSubjectsModel::getSubjectsList(),
                        'filterInputOptions' => ['prompt' => 'Pilih Mata Pelajaran', 'class' => 'form-control', 'id' => null]
                    ],
                    // 'description:ntext',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{view} {publish} {update} {delete}',
                        'buttons' => [
                                'publish' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-link"></i> Bagikan</span>', $url, [
                                                'title' => Yii::t('app', 'Bagikan Soal'),
                                                'class'=>'btn modal-form',
                                                'data-size' => 'modal-lg',
                                    ]);
                                },
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Detail</span>', $url, [
                                                'title' => Yii::t('app', 'Lihat Detail Soal'),
                                                'class'=>'btn modal-form',
                                                'data-size' => 'modal-lg',
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Ubah</span>', $url, [
                                                'title' => Yii::t('app', 'Ubah Soal'),
                                                'class'=>'btn modal-form',
                                                'data-size' => 'modal-lg',

                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</span>', $url, [
                                                'title' => Yii::t('app', 'Hapus Soal'),
                                                'class'=>'btn',
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
