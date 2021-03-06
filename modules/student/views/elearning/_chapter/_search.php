<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SubjectsPlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-plan-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['/student/elearning/chapter','id'=>$model->elearning_id],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'elearning_id')->textInput()->dropDownList(
        \app\models\SubjectsPlanModel::getRelatedSubjectsPlanModelListsByParentId($model->eLearningItemsModelBelongsToSubjectsPlanModel->parent_id)
    	); 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-search"></i> Cari Materi'), ['class' => 'btn btn-block btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
