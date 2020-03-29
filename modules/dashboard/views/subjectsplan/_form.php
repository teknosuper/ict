<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\filemanager\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectsPlanModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-plan-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'subject_id')->textInput() ?>

    <?php // $form->field($model, 'chapter')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'cover_image')->widget(FileInput::className(), [
        'buttonTag' => 'button',
        'buttonName' => 'Browse',
        'buttonOptions' => ['class' => 'btn btn-default'],
        'options' => ['class' => 'form-control'],
        // Widget template
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        // Optional, if set, only this image can be selected by user
        'thumb' => 'original',
        // Optional, if set, in container will be inserted selected image
        'imageContainer' => '.img',
        // Default to FileInput::DATA_URL. This data will be inserted in input field
        'pasteData' => FileInput::DATA_URL,
        // JavaScript function, which will be called before insert file data to input.
        // Argument data contains file data.
        // data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
        'callbackBeforeInsert' => 'function(e, data) {
            console.log( data );
        }',
    ]);

    ?>

    <?= $form->field($model, 'learning_objective')->widget(FileInput::className(), [
        'buttonTag' => 'button',
        'buttonName' => 'Browse',
        'buttonOptions' => ['class' => 'btn btn-default'],
        'options' => ['class' => 'form-control'],
        // Widget template
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        // Optional, if set, only this image can be selected by user
        'thumb' => 'original',
        // Optional, if set, in container will be inserted selected image
        'imageContainer' => '.img',
        // Default to FileInput::DATA_URL. This data will be inserted in input field
        'pasteData' => FileInput::DATA_URL,
        // JavaScript function, which will be called before insert file data to input.
        // Argument data contains file data.
        // data example: [alt: "Ведьма с кошкой", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
        'callbackBeforeInsert' => 'function(e, data) {
            console.log( data );
        }',
    ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-save"></i> Simpan Perubahan'), ['class' => 'btn btn-block btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
