<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersModel */
/* @var $form ActiveForm */
?>

<div class="row">
	<?php if(\Yii::$app->session->hasFlash('success')):?>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="callout callout-success">
	            <h4>Sukses</h4>

	            <p><?= \Yii::$app->session->getFlash('success');?></p>
	      	</div>					
		</div>
	</div>
	<?php endif;?>
  	<div class="col-md-12">
		<div class="col-md-4">
			<?php 
			    switch (\yii::$app->user->identity->userType) {
			      case 'student':
			        echo $this->render('_userType/student');
			        # code...
			        break;
			      case 'teacher':
			        echo $this->render('_userType/teacher');
			        # code...
			        break;      
			      case 'admin':
			        echo $this->render('_userType/admin');
			        # code...
			        break;
			      default:
			        # code...
			        break;
			    }

			?>
		</div>
		<div class="col-md-8">
          	<div class="box box-primary box-solid">
	            <div class="box-header with-border">
	              <i class="fa fa-gear"></i>

	              <h3 class="box-title">Ganti Password</b></h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body" style="word-wrap: break-word;">
					
					<div class="site-index">

					    <?php $form = ActiveForm::begin(); ?>

					        <?= $form->field($model, 'new_password')->passwordInput() ?>
					        <?= $form->field($model, 'confirm_password')->passwordInput() ?>
					    
					        <div class="form-group">
					            <?= Html::submitButton(Yii::t('app', 'Ganti'), ['class' => 'btn btn-primary']) ?>
					        </div>
					    <?php ActiveForm::end(); ?>

					</div><!-- site-index -->
	            
	            </div>
	            <!-- /.box-body -->
          	</div>
	          <!-- /.box -->
		</div>  		
  	</div>
</div>
