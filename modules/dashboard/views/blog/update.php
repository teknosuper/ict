<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ELearningItemsModel */

$this->title = Yii::t('app', 'Ubah Blog : '.$model->chapter);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tahukah Kamu ?'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->chapter, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>
