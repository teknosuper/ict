<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubjectsPlanModel */

$this->title = Yii::t('app', 'Create Subjects Plan Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects Plan Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-plan-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
