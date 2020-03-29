<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MasterCountryModel */

$this->title = Yii::t('app', 'Create Master Country Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Master Country Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-country-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
