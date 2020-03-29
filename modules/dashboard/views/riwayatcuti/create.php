<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiCutiModel */

$this->title = Yii::t('app', 'Create Pegawai Cuti Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pegawai Cuti Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-cuti-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
