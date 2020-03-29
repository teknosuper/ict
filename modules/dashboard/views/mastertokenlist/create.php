<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MasterTokenListModel */

$this->title = Yii::t('app', 'Create Master Token List Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Master Token List Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-token-list-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
