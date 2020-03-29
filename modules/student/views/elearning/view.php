<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ELearningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $searchModel->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'E Learning'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\conquer\modal\ModalForm::widget([
    'selector' => '.modal-form',
]);
?>

<div class="col-md-12">
      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pilih Materi</h3>

          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">


    <?php echo $this->render('_chapter/_search', ['model' => $searchModel]); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->    
</div>

<div class="spe-title col-md-12">
  <h2><span><?= $searchModel->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;?></span></h2>
  <div class="title-line">
    <div class="tl-1"></div>
    <div class="tl-2"></div>
    <div class="tl-3"></div>
  </div>
  <p>Halaman Detail Materi <?= $searchModel->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;?></p>
</div>

<div class="col-md-12">
  <div class="posts" style="word-wrap: break-word;">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="tour_right tour_rela tour-ri-com">
            <h3 class="text-center">Materi <?= $searchModel->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;?></h3>
              <h5 style="padding:10px;"><span class="post_author">Penulis: <?= $model->eLearningItemsModelBelongsToUsersModel->userBelongsToUserType->full_name;?></span><span class="post_date">Tanggal Diunggah: <?= $model->created_time;?></span><span class="post_city">BAB : <?=$model->eLearningItemsModelBelongsToSubjectsPlanModel->subjectsPlanModelBelongsToParent->chapter;?></span></h5>
              <div style="padding:10px;">
                <p style="color: black;"><?= \app\models\HelpersClass::getTextClean($model->content);?></p>                
              </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 tour_r">  

                <div class="tour_right tour_rela tour-ri-com">
                  <h3 class="text-center">Simulasi Materi Terkait</h3>
                  <?php if($model->eLearningItemsModelHasManySimulationModel):?>
                    <?php foreach($model->eLearningItemsModelHasManySimulationModel as $eLearningItemsModelHasManySimulationModel):?>

                          <div class="tour_rela_1 text-center"> 
                            <iframe src="<?=$eLearningItemsModelHasManySimulationModel->file_html;?>"></iframe>
                            <h4><?=$eLearningItemsModelHasManySimulationModel->title;?></h4>
                            <p><?=$eLearningItemsModelHasManySimulationModel->description;?></p> <a href="<?= \yii\helpers\Url::toRoute(['/student/simulation/view','id'=>$eLearningItemsModelHasManySimulationModel->id]);?>" class="link-btn modal-form" data-size = 'modal-lg'>Mainkan Simulasi</a> </div>

                    <?php endforeach;?>
                  <?php endif;?>
                </div>

                <div class="tour_right tour_rela tour-ri-com">
                  <h3 class="text-center">Tahukah Kamu ?</h3>
                  <?php if($model->eLearningItemsModelHasManyBlog):?>
                    <?php foreach($model->eLearningItemsModelHasManyBlog as $eLearningItemsModelHasManyBlog):?>

                          <div class="tour_rela_1 text-center"> 
                            <img class="img img-responsive" src="<?=$eLearningItemsModelHasManyBlog->cover_image;?>">
                            <h4><?=$eLearningItemsModelHasManyBlog->chapter;?></h4>
                            <p><?=$eLearningItemsModelHasManyBlog->description;?></p> <a href="<?= \yii\helpers\Url::toRoute(['/student/blog/view','id'=>$eLearningItemsModelHasManyBlog->id]);?>" class="link-btn modal-form" data-size = 'modal-lg'>Baca Selengkapnya</a> </div>

                    <?php endforeach;?>
                  <?php endif;?>
                </div>
        </div>

  </div>  

</div>