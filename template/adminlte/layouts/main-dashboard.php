<?php
use yii\helpers\Html;

app\template\adminlte\assets\Assets::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  	<?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('head','top');?>
    <title><?=$this->title;?></title>
    <!--== META TAGS ==-->
  	<meta charset="<?= Yii::$app->charset ?>"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="/templates/maindashboard/css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="/templates/maindashboard/css/style.css">
    <!-- <link rel="stylesheet" href="/templates/maindashboard/css/materialize.css"> -->
    <link rel="stylesheet" href="/templates/maindashboard/css/bootstrap.css">
    <link rel="stylesheet" href="/templates/maindashboard/css/mob.css">
    <link rel="stylesheet" href="/templates/maindashboard/css/animate.css">
  	<link rel="stylesheet" href="/templates/wiro/dist/css/AdminLTE.min.css">

  	<link rel="stylesheet" href="/templates/wiro/bower_components/font-awesome/css/font-awesome.min.css">

    <script type="text/javascript" async
      src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML">
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="/templates/maindashboard/js/html5shiv.js"></script>
	<script src="/templates/maindashboard/js/respond.min.js"></script>
	<![endif]-->
  	<?php $this->head() ?>
  	<?=  $getScriptCode = \app\models\ScriptClass::getScriptCodeByTagLocation('head','bottom');?>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <?php 
        switch (\yii::$app->user->identity->userType) {
            case 'student':
                echo $this->render('_header/_header_student');
                # code...
                break;
            case 'teacher':
                echo $this->render('_header/_header_teacher');
                # code...
                break;
            case 'admin':
                echo $this->render('_header/_header_admin');
                # code...
                break;            
            default:
                # code...
                break;
        }
    ?>
	
	<!--DASHBOARD-->
	<section>
		<div class="db" style="background-image: url('/templates/maindashboard/images/background-rumus-fisika.jpg');min-height: 300px;">

			<div class="row" style="background: rgba(255,255,255,0.9);">
			    <?= $this->render(
			        '_content2.php',
			        ['content' => $content]
			    ) ?>

			</div>

		</div>
	</section>
	<!--END DASHBOARD-->

	<!--====== FOOTER 2 ==========-->
	<section>
		<div class="rows">
			<div class="footer" style="background: none;">
				<div class="container">
					<div class="foot-sec2">
						<div>
							<div class="row">
								<div class="col-sm-4 foot-spec foot-com">
									<h4><span>Blended For School</span></h4>
									<p>Pembelajaran Campuran Berbasis Web untuk guru dan siswa</p>
								</div>
								<div class="col-sm-4 col-md-4 foot-spec foot-com">
									<h4><span>Informasi</span> & Bantuan</h4>
									<ul class="two-columns">
										<li> <a href="#">Tentang Program</a> </li>
										<li> <a href="#">Panduan Program</a> </li>
										<li> <a href="#">FAQ</a> </li>
                                        <li> <a href="#">Hubungi Kami</a> </li>
									</ul>
								</div>
								<div class="col-sm-4 foot-social foot-spec foot-com">
									<h4><span>Kontak</span> Kerjasama</h4>
									<p>gitaayupermatasari@student.unnes.ac.id</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== FOOTER - COPYRIGHT ==========-->
	<section>
		<div class="rows copy">
			<div class="container">
				<p><?= \app\models\HostnameClass::getHost();?> &copy;<?= date('Y');?> by GITA AYU PERMATASARI</p>
			</div>
		</div>
	</section>
	<!--========= Scripts ===========-->
	<script src="/templates/maindashboard/js/jquery-latest.min.js"></script>
	<script src="/templates/maindashboard/js/bootstrap.js"></script>
	<script src="/templates/maindashboard/js/wow.min.js"></script>
	<script src="/templates/maindashboard/js/materialize.min.js"></script>
	<script src="/templates/maindashboard/js/custom.js"></script>
    <?php $this->endBody() ?>
</body>

</html>


<?php $this->endPage() ?>
