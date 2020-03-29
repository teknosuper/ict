<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\filemanager\widgets\TinyMCE;
use pendalf89\filemanager\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\ELearningItemsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elearning-items-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chapter')->textInput();?>    

    <?= $form->field($model, 'elearning_id')->dropDownList(
            \app\models\SubjectsPlanModel::getSubjectsPlanModelLists()
        ); 
    ?>

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
    ]); ?>

    <?= $form->field($model, 'content')->widget(TinyMCE::className(), [
        'clientOptions' => [
            'menubar' => false,
            'height' => 500,
            'image_dimensions' => false,
            'external_plugins' => [
                'tiny_mce_wiris'=>'https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce4@7.17.0/plugin.min.js',
            ],
            'plugins' => [
                'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table media',
            ],
            'toolbar' => 'fontselect | fontsizeselect | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | table | contextmenu | paste | searchreplace tiny_mce_wiris_formulaEditor superscript subscript media',
        ],
    ]); ?>

    <?= $form->field($model, 'description')->widget(TinyMCE::className(), [
        'clientOptions' => [
            'menubar' => false,
            'height' => 500,
            'image_dimensions' => false,
            'external_plugins' => [
                'tiny_mce_wiris'=>'https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce4@7.17.0/plugin.min.js',
            ],
            'plugins' => [
                'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table media',
            ],
            'toolbar' => 'fontselect | fontsizeselect | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | table | contextmenu | paste | searchreplace tiny_mce_wiris_formulaEditor superscript subscript media',
        ],
    ]); ?>

    <?= $form->field($model, 'status')->textInput()->dropDownList(
            \app\models\HelpersClass::getStatusList()
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
