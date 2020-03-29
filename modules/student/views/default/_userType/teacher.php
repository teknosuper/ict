
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= \yii::$app->user->identity->userProfilePic;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= \yii::$app->user->identity->userBelongsToUserType->full_name;?></h3>

              <p class="text-muted text-center"><span class="badge"><?= \yii::$app->user->identity->userType;?></span></p>

              <ul class="list-group list-group-unbordered">

              </ul>

              <a href="/profile/password" class="btn btn-primary btn-block"><b>Ganti Password</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
