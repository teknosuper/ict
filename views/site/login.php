<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
$this->title = 'Halaman Masuk Blended For School';
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="well">
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
                        <img src="/templates/maindashboard/images/logo.png" alt="" />
                        <div class="row">
                            <?= $form
                                ->field($model, 'username', $fieldOptions1)
                                ->label(false)
                                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
                        </div>
                        <div class="row">
                            <?= $form
                                ->field($model, 'password', $fieldOptions2)
                                ->label(false)
                                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                        </div>
                        <div class="row">
                                <?= Html::submitButton('Masuk Sistem', ['class' => 'waves-effect waves-light btn-large btn-log-in btn-block', 'name' => 'login-button']) ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span style="color:#e03a74;"><b><?= \app\models\HostnameClass::getHost();?> &copy; <?= date('Y');?></span>                                            
                            </div>
                        </div>
                        <!-- <a href="forgot.html" class="for-pass">Forgot Password?</a> -->
                    <?php ActiveForm::end(); ?>
                </div>                            
            </div>

        </div>
    </div>
