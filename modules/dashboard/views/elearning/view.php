<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataModel app\models\ELearningModel */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'E-Learning'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
\conquer\modal\ModalForm::widget([
    'selector' => '.modal-form',
]);
?>


<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Tambah Sub Bab'), ['create'], ['class' => 'btn btn-success']) ?>
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
                        'attribute' => 'subject_id',
                        'value' => function ($model) {
                            return ($model->subjectsPlanModelBelongsToMasterSubjectsModel) ? $model->subjectsPlanModelBelongsToMasterSubjectsModel->subjects : null;
                        },
                        'filter' => \app\models\MasterSubjectsModel::getSubjectsList(),
                        'filterInputOptions' => ['prompt' => 'Pilih Mata Pelajaran', 'class' => 'form-control', 'id' => null]
                    ],                    
                    [
                        'attribute' => 'chapter',
                        'value' => function ($model) {
                            return $model->chapter;
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '#',
                        'headerOptions' => ['style' => 'color:#337ab7;text-align: center;'],
                        'template' => '{view} {update} {reference}',
                        'contentOptions' => ['style'=>'padding:0px 0px 0px 30px;text-align: center;'],
                        'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-danger"><i class="fa fa-plus"></i> Detail Materi</span>', $url, [
                                                'title' => Yii::t('app', 'Lihat Detail Bab'),
                                                'data-pjax' =>0,                                               
                                    ]);
                                },

                                'publish' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah Soal Latihan</span>', $url, [
                                                'title' => Yii::t('app', 'Tambah Soal Latihan'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url = \yii\helpers\Url::toRoute(['/dashboard/subjectsplan/update','id'=>$model->id]);
                                    return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Tujuan Pembelajaran</span>', $url, [
                                                'title' => Yii::t('app', 'Tambah Tujuan Pembelajaran'),

                                    ]);
                                },
                                'reference' => function ($url, $model) {
                                    $url = \yii\helpers\Url::toRoute(['/dashboard/subjectreference/create','subject_plan_id'=>$model->id]);
                                    return Html::a('<span class="btn btn-xs btn-warning"><i class="fa fa-plus"></i> Daftar Referensi</span>', $url, [
                                                'title' => Yii::t('app', 'Ubah Bab'),

                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</span>', $url, [
                                                'title' => Yii::t('app', 'Hapus Bab'),
                                    ]);
                                }
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            $quiz_id = \yii::$app->request->get('id');
                            if ($action === 'items') {
                                $url ='/dashboard/elearningitems?quiz_item_id='.$model->id;
                                return $url;
                            }
                            if ($action === 'view') {
                                $url ='/dashboard/elearningitems?id='.$model->id;
                                return $url;
                            }

                            if ($action === 'update') {
                                $url ='/dashboard/elearningitems/update?id='.$model->id;
                                return $url;
                            }
                            if ($action === 'update') {
                                $url ='/dashboard/elearningitems/update?id='.$model->id;
                                return $url;
                            }
                        }
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
