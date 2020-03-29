<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SimulationModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Simulasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary modal-form','data-size' => 'modal-lg']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
            [
                'attribute' => 'subjects_plan_id',
                'value' => function ($model) {
                    return ($model->simulationModelBelongsToSubjectsPlanModel) ? $model->simulationModelBelongsToSubjectsPlanModel->chapter : null;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'file_html',
                'format'=>'raw',
                'value' => function ($model) {
                    return '<div class="embed-responsive embed-responsive-16by9"><iframe src="'.$model->file_html.'"></iframe></div>';
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            'description:raw',
            // 'created_by',
            // 'created_time',
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