<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\QuizModel */

$this->title = $dataModel->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Soal & Latihan'), 'url' => ['index']];
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
          <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $dataModel->id], ['class' => 'btn btn-primary modal-form','data-size' => 'modal-lg']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $dataModel->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $dataModel,
        'attributes' => [
            // 'id',
            'title',
            'description:html',
            [
                'attribute' => 'teacher_id',
                'value' => function ($model) {
                    return $model->quizBelongsToTeachers->full_name;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'subject_id',
                'value' => function ($model) {
                    return $model->quizBelongsToMasterSubjectsModel->subjects;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            'status',
        ],
    ]) ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>

<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Soal</h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Tambah Soal'), ['/dashboard/quizitems/create','quiz_id'=>\yii::$app->request->get('id')], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
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
                            return GridView::ROW_EXPANDED;
                        },
                        // uncomment below and comment detail if you need to render via ajax
                        // 'detailUrl'=>Url::to(['/dashboard/quizitemsoptions?quiz_item_id='.$model->id]),
                        'detail' => function ($model, $key, $index, $column) {
                            return Yii::$app->controller->renderPartial('_expand/quiz_item_detail', ['model' => $model]);
                        },
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'expandOneOnly' => true,
                    ],
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    // 'quiz_id',
                    // [
                    //     'attribute'=>'text',
                    //     'format' => 'raw',
                    //     // 'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                    //     'value' => function ($model) {
                    //         return $model->text;
                    //     },
                    // ],
                    'text:raw',
                    [
                        'attribute' => 'quiz_type',
                        'value' => function ($model) {
                            return \app\models\QuizItemsModel::getQuizTypeListDetail($model->quiz_type);
                        },
                        'filter' => \app\models\QuizItemsModel::getQuizTypeList(),
                        'filterInputOptions' => ['prompt' => 'Semua Tipe Kuis', 'class' => 'form-control', 'id' => null]
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
                                'items' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                                'title' => Yii::t('app', 'Tambah Jawaban'),
                                                'class'=>'btn modal-form',
                                                'data-size' => 'modal-lg',
                                    ]);
                                },
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Detail</span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                                'class'=>'btn modal-form',
                                                'data-size' => 'modal-lg',
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Ubah</span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                                'class'=>'btn',
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                                'class'=>'btn',
                                                'data-method'=>'post',
                                                'data-confirm'=>'Apakah anda yakin akan menghapus data ini? ',
                                    ]);
                                }
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            $quiz_id = \yii::$app->request->get('id');
                            if ($action === 'items') {
                                $url ='/dashboard/quizitemsoptions?quiz_item_id='.$model->id;
                                return $url;
                            }
                            if ($action === 'view') {
                                $url ='/dashboard/quizitems/view?id='.$model->id.'&quiz_id='.$quiz_id;
                                return $url;
                            }

                            if ($action === 'update') {
                                $url ='/dashboard/quizitems/update?id='.$model->id.'&quiz_id='.$quiz_id;
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url ='/dashboard/quizitems/delete?id='.$model->id.'&quiz_id='.$quiz_id;
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
