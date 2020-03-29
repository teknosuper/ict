<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClassroomsModel */

$this->title = Yii::t('app', 'Create Classrooms Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Classrooms Models'), 'url' => ['index']];
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
