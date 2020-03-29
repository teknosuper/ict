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
        <div class="box-body">

            <?php Pjax::begin(['id' => 'my_pjax']); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'value' => function ($model) {
                    return $model->name;
                },
                'filter' => false,
            ],
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return \app\models\SubjectsPlanReferenceModel::getTypeListDetail($model->type);
                },
                'filter' => false,
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
            [
                'attribute' => 'url',
                'format'=>'raw',
                'value' => function ($model) {
                	return "<a target='__blank' href='".$model->url."'>".$model->url."</a>";
                },
                'filter' => false,
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
