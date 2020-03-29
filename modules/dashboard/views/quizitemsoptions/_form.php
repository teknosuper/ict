<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\filemanager\widgets\TinyMCE;

/* @var $this yii\web\View */
/* @var $model app\models\QuizItemsOptionsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-items-options-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'quiz_item_id')->textInput() ?>

    <?= $form->field($model, 'option')->textInput()->dropDownList(
        \app\models\QuizItemsOptionsModel::getOptionsList()
        ); 
        // ['prompt'=>'Pilih Mata Pelajaran']); 
    ?>

    <?php if(\yii::$app->request->get('equation')==1):?>
        <?= $form->field($model, 'value')->widget(TinyMCE::className(), [
            'clientOptions' => [
                'menubar' => false,
                'height' => 500,
                'image_dimensions' => false,
                'external_plugins' => [
                    'tiny_mce_wiris'=>'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js',
                ],
                'plugins' => [
                    'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table',
                ],
                'toolbar' => 'fontselect | fontsizeselect | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | table | contextmenu | paste | searchreplace tiny_mce_wiris_formulaEditor',
            ],
        ]); ?>
    <?php else:?>
        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
    <?php endif;?>


    <?= $form->field($model, 'is_correct_answer')->textInput()->dropDownList(
        \app\models\QuizItemsOptionsModel::getIsCorrectAnswerList()
        ); 
        // ['prompt'=>'Pilih Mata Pelajaran']); 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
