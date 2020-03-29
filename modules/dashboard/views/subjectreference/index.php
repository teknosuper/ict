<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SubjectsPlanReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Referensi Materi');
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
        <?= Html::a(Yii::t('app', 'Tambah Referensi Materi'), ['create','subject_plan_id'=>\yii::$app->request->get('subject_plan_id')], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute' => 'subject_plan_id',
                'value' => function ($model){
                   return ($model->subjectsPlanReferenceModelBelongsToSubjectsPlanModel) ? $model->subjectsPlanReferenceModelBelongsToSubjectsPlanModel->chapter : null;
                },
                'filter' => \app\models\SubjectsPlanModel::getSubjectsPlanModelLists(),
                'filterInputOptions' => ['prompt' => 'Pilih Materi Pelajaran', 'class' => 'form-control', 'id' => null]
            ],  
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return \app\models\SubjectsPlanReferenceModel::getTypeListDetail($model->type);
                },
                'filter' => \app\models\SubjectsPlanReferenceModel::getTypeList(),
                'filterInputOptions' => ['prompt' => 'Pilih Status', 'class' => 'form-control', 'id' => null]
            ],
            [
                'attribute' => 'file',
                'format'=>'raw',
                'value' => function ($model) {
                    if($model->file)
                    {
                        $urlPreview = \yii\helpers\Url::to($model->file,true);
                        return \app\models\HelpersClass::getPreviewLink($urlPreview);                        
                    }
                },
                'filter' => false,
            ],
            'url:url',

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
