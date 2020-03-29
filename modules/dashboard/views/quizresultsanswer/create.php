<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuizResultsAnswerModel */

$this->title = Yii::t('app', 'Create Quiz Results Answer Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quiz Results Answer Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quiz-results-answer-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
