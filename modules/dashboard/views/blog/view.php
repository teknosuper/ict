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

    <div class="rows">
        <div class="posts">
            <div class="col-md-6 col-sm-6 col-xs-12"> <img src="<?=$model->cover_image;?>" alt=""> </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h3><?= $model->chapter;?></h3>
                <h5><span class="post_author">Diunggah Oleh: <?= $model->eLearningItemsModelBelongsToUsersModel->userBelongsToUserType->full_name;?></span> |<span class="post_date">Tanggal: <?= $model->created_time;?></span> | <span class="post_city">Materi: <?= $model->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;?></span></h5>

                <p><?=$model->content;?></p>
            </div>
        </div>
    </div>