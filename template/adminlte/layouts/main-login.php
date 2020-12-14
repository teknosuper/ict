<?php
use yii\helpers\Html;

app\template\adminlte\assets\Assets::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  	<meta charset="<?= Yii::$app->charset ?>"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
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

	  <!-- Google Font -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	  <?php $this->head() ?>
	  <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('head','bottom');?>
</head>
<body class="">
	<?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('body','top');?>
  <?php $this->beginBody() ?>

	<div class="content" style="min-height: 600px;">
	    <?= $content ?>		
	</div>

<?php $this->endBody() ?>
    <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('body','bottom');?>
</body>
</html>
<?php $this->endPage() ?>