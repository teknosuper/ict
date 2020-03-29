<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTokenListModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-token-list-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usedTime')->textInput() ?>

    <?= $form->field($model, 'access_token_status')->textInput() ?>

    <?= $form->field($model, 'token_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdTime')->textInput() ?>

    <?= $form->field($model, 'createdUserId')->textInput() ?>

    <?= $form->field($model, 'updatedTime')->textInput() ?>

    <?= $form->field($model, 'updatedUserId')->textInput() ?>

    <?= $form->field($model, 'deletedTime')->textInput() ?>

    <?= $form->field($model, 'deletedUserId')->textInput() ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'error_message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'next_limit_time')->textInput() ?>

    <?= $form->field($model, 'quota_remaining')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_limit')->textInput() ?>

    <?= $form->field($model, 'error_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
