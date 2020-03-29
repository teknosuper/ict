<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuizItemsOptionsModel */

$this->title = Yii::t('app', 'Tambah Pilihan Jawaban');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pilihan Jawaban'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

    <h1><?= Html::encode($this->title) ?></h1>

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
