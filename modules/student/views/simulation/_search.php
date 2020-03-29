<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SubjectsPlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-plan-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'subject_id')->textInput()->dropDownList(
        \app\models\MasterSubjectsModel::getSubjectsList(),
        // $listData, 
        ['prompt'=>'Pilih Mata Pelajaran']); 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-search"></i> Cari Mata Pelajaran'), ['class' => 'btn btn-block btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
