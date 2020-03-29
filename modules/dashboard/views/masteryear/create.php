<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MasterYearModel */

$this->title = Yii::t('app', 'Create Master Year Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Master Year Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-year-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
