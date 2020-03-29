<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ELearningItemsModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'E Learning Items Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>


      <div class="col-md-12" id="<?= $model->chapter;?>">
              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-book"></i>

                  <h3 class="box-title"><?= $model->chapter;?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="word-wrap: break-word;">
                  <p><?= \app\models\HelpersClass::getTextClean($model->content);?></p>
                </div>
                <div class="box-footer">
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
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
      </div>          

