<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'E-learning');
$this->params['breadcrumbs'][] = $this->title;
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

            <?php Pjax::begin(['id' => 'my_pjax']); ?>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Tambah Elearning'), ['/dashboard/elearningitems/create'], ['class' => 'btn btn-success modal-form','data-size' => 'modal-lg']) ?>
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
                        'attribute' => 'school_id',
                        'value' => function ($model){
                           return ($model->subjectsBelongsToSchool) ? $model->subjectsBelongsToSchool->school_name : null;
                        },
                        'filter' => \app\models\MasterSchoolModel::getSchoolList(),
                        'filterInputOptions' => ['prompt' => 'Pilih Sekolah', 'class' => 'form-control', 'id' => null]
                    ],                    
                    [
                        'attribute' => 'subjects',
                        'value' => function ($model) {
                            return ($model->subjects) ? $model->subjects : null;
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return \app\models\HelpersClass::getStatusListDetail($model->status);
                        },
                        'filter' => \app\models\HelpersClass::getStatusList(),
                        'filterInputOptions' => ['prompt' => 'Pilih Status', 'class' => 'form-control', 'id' => null]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{view}',
                        'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="fa fa-eye"></span> detail', $url, [
                                                'title' => Yii::t('app', 'view'),
                                                'class'=>'btn btn-success btn-xs modal-form',
                                                'data-size' => 'modal-lg',
                                                'data-pjax' =>0,
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                                'title' => Yii::t('app', 'update'),
                                                'class'=>'btn btn-warning btn-xs modal-form',
                                                'data-size' => 'modal-lg',
                                                'data-pjax' =>0,
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
