<?php

/* @var $this yii\web\View */

$this->title = 'Blended For School';
?>
<div class="col-md-12">

    <div class="body-content">

        <?php 
            switch (\yii::$app->user->identity->userType) {
                case 'student':
                    echo $this->render('_dashboard/_student');
                    # code...
                    break;
                case 'teacher':
                    echo $this->render('_dashboard/_teacher');
                    # code...
                    break; 
                case 'admin':
                    # code...
                    break;                                   
                default:
                    # code...
                    break;
            }
        ?>

    </div>
</div>
