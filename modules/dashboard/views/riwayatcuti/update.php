<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiCutiModel */

$this->title = Yii::t('app', 'Update Pegawai Cuti Model: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pegawai Cuti Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pegawai-cuti-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
