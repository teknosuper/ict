<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClassroomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Classrooms Models');
$this->params['breadcrumbs'][] = $this->title;

\conquer\modal\ModalForm::widget([
    'selector' => '.modal-form',
]);

?>
<div class="col-md-12">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body" style="overflow-x: scroll;">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Create Classrooms Model'), ['create'], ['class' => 'btn btn-success modal-form','data-size' => 'modal-lg']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    // 'school_id',
                    [
                        'label' => 'school_id',
                        'attribute' => 'school_id',
                        'value' => function ($model) {
                            return ($model->classroomsBelongsToSchool) ? $model->classroomsBelongsToSchool->school_name : null;
                        },
                        'filter' => \app\models\MasterSchoolModel::getSchoolList(),
                        'filterInputOptions' => ['prompt' => 'All Categories', 'class' => 'form-control', 'id' => null]
                    ],
                    'classroom_name',
                    'classroom_description',

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
                        // 'urlCreator' => function ($action, $model, $key, $index) {
                        //     if ($action === 'view') {
                        //         $url ='view?id='.$model->id;
                        //         return $url;
                        //     }

                        //     if ($action === 'update') {
                        //         $url ='update?id='.$model->id;
                        //         return $url;
                        //     }
                        // }
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
