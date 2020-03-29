<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ELearningItemsModel */

$this->title = $model->chapter;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tahukah Kamu ?'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

    <div class="col-md-12">
        <div class="spe-title col-md-12">
            <h2><span>Tahukah Kamu ?</span></h2>
            <div class="title-line">
                <div class="tl-1"></div>
                <div class="tl-2"></div>
                <div class="tl-3"></div>
            </div>
            <p><h3><?= $model->chapter;?></h3></p>
        </div>        
    </div>

    <div class="rows">
        <div class="posts">
            <div class="col-md-4 col-sm-4 col-xs-12"> <img src="<?=$model->cover_image;?>" alt=""> </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <h5><span class="post_author">Diunggah Oleh: <?= $model->eLearningItemsModelBelongsToUsersModel->userBelongsToUserType->full_name;?></span> |<span class="post_date">Tanggal: <?= $model->created_time;?></span> | <span class="post_city">Materi: <?= $model->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;?></span></h5>

                <p><?=$model->content;?></p>
            </div>
        </div>
    </div>