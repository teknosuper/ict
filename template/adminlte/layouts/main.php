<?php
use yii\helpers\Html;

app\template\adminlte\assets\Assets::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>

<html>
<head>
  <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('head','top');?>
  <meta charset="<?= Yii::$app->charset ?>"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$this->title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/templates/wiro/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/templates/wiro/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/templates/wiro/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/templates/wiro/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/templates/wiro/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?php $this->head() ?>
  <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('head','bottom');?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('body','top');?>
  <?php $this->beginBody() ?>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= \app\models\UrlClass::generateUrl('site',['site/index']);?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BFS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Blended</b> For School</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <?= \touqeer\notification\Notify::widget(); ?>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= \yii::$app->user->identity->userProfilePic;?>" class="user-image" alt="User Image">
              <?php if(!\yii::$app->user->isGuest):?>
              <span class="hidden-xs"><?= \yii::$app->user->identity->userBelongsToUserType->full_name;?></span>
              <?php endif;?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= \yii::$app->user->identity->userProfilePic;?>" class="img-circle" alt="User Image">

                <p>
                  <?php if(!\yii::$app->user->isGuest):?>

                  <?php endif;?>
                </p>
                <p><small><?= \yii::$app->user->identity->userBelongsToUserType->full_name;?></small></p>
                <p><small class="badge"><?= \yii::$app->user->identity->userType;?></small></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= \app\models\UrlClass::generateUrl('admin_page',['profile']);?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a data-method="post" href="<?= \app\models\UrlClass::generateUrl('logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if(!\yii::$app->user->isGuest):?>
          <?php switch (\yii::$app->user->identity->userType) {
            case 'teacher':
                echo $this->render('_sidebar/teacher');
              # code...
              break;
            case 'student':
                echo $this->render('_sidebar/student');
              # code...
              break;              
            case 'admin':
                echo $this->render('_sidebar/admin');
              # code...
              break;              
            default:
              # code...
              break;
          }            
          ?>

        <?php endif;?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <?= $this->render(
        '_content.php',
        ['content' => $content]
    ) ?>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right">
        <b><?= \app\models\HostnameClass::getHost();?> <?= date('Y');?> by GITA AYU PERMATASARI</b>
      </div>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="/templates/wiro/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- SlimScroll -->
<script src="/templates/wiro/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/templates/wiro/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/templates/wiro/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->


    <?php $this->endBody() ?>
    <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('body','bottom');?>
</body>

</html>

<?php $this->endPage() ?>


