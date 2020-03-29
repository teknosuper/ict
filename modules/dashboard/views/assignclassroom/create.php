<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AssignClassroomModel */

$this->title = Yii::t('app', 'Create Assign Classroom Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Assign Classroom Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-classroom-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
