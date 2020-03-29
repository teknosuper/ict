<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningItemsModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tahukah Kamu ?');
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
        <div class="box-body">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Tambah Tahukah Kamu ?'), ['create','subject_id'=>\yii::$app->request->get('id')], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    [
                        'attribute' => 'elearning_id',
                        'value' => function ($model){
                           return ($model->eLearningItemsModelBelongsToSubjectsPlanModel) ? $model->eLearningItemsModelBelongsToSubjectsPlanModel->chapter : null;
                        },
                        'filter' => \app\models\SubjectsPlanModel::getSubjectsPlanModelLists(),
                        'filterInputOptions' => ['prompt' => 'Pilih Materi Pelajaran', 'class' => 'form-control', 'id' => null]
                    ],  
                    [
                        'attribute' => 'cover_image',
                        'format' => 'raw',
                        'value' => function ($model){
                           return ($model->cover_image) ? "<img class='img img-responsive' src=".$model->cover_image." />" : null;
                        },
                        'filter' => false,
                    ],          
                    'chapter',
                    [
                        'attribute' => 'content',
                        'value' => function($model) {
                            $ret = \yii\helpers\StringHelper::truncateWords(strip_tags($model->content), 50, '...', false);
                            return $ret;
                        }
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
