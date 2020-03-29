<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HostnameClass */

$this->title = Yii::t('app', 'Create Hostname Class');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hostname Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
