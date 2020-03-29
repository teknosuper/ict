<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuizItemsModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quiz Items Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            [
                'attribute' => 'quiz_id',
                'value' => function ($model) {
                    return ($model->quizItemsBelongsToQuizModel) ? $model->quizItemsBelongsToQuizModel->title : null;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'text',
                'format'=>'raw',
                'value' => function ($model) {
                    return $model->text;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'answer_description',
                'format'=>'raw',
                'value' => function ($model) {
                    return $model->answer_description;
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'quiz_type',
                'value' => function ($model) {
                    return \app\models\QuizItemsModel::getQuizTypeListDetail($model->quiz_type);
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return \app\models\HelpersClass::getStatusListDetail($model->status);
                },
                // 'contentOptions' => ['class' => 'bg-grey'],     // HTML attributes to customize value tag
                // 'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
            ],
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
