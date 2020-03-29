<div class="row">
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
    </div>
</div>
