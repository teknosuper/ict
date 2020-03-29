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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="/images/fav.ico">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="/templates/maindashboard/css/style.css">
    <link rel="stylesheet" href="/templates/maindashboard/css/mob.css">
    <link rel="stylesheet" href="/templates/maindashboard/css/bootstrap.css">
    <link rel="stylesheet" href="/templates/maindashboard/css/materialize.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	  <?php $this->head() ?>
	  <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('head','bottom');?>
</head>

<body style="background-image: url('/templates/maindashboard/images/background-rumus-fisika.jpg');min-height: 300px;">
	<?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('body','top');?>
  <?php $this->beginBody() ?>

    <section>
        <?= $content ?>     
    </section>

	<?php $this->endBody() ?>
    <?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('body','bottom');?>
</body>
</html>
<?php $this->endPage() ?>