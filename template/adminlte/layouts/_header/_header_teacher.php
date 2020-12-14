    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="/"><img src="/templates/maindashboard/images/logo.png" alt="" />
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>Halaman Utama</h4>
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li><a href="/dashboard/results">Hasil Belajar</a></li>
                                <li><a href="/profile">Profile</a></li>
                            </ul>
                            <h4>Input Materi dan Bank Soal</h4>
                            <ul>
                                <li><a href="/dashboard/blog">Tahukah Kamu ?</a></li>
                                <li><a href="/dashboard/elearning">Membuat Materi Pelajaran</a></li>
                                <li><a href="/dashboard/simulation">Mengunggah Simulasi Materi Pelajaran</a></li>
                                <!-- <li><a href="/dashboard/banksoal">Membuat Bank Soal Latihan</a></li> -->
                                <li><a href="/dashboard/quiz">Membuat Bank Soal Quiz</a></li>
                            </ul>
                            <ul>
                              <?php if(!\yii::$app->user->isGuest):?>
                                <li><a data-method="post" href="<?= \app\models\UrlClass::generateUrl('logout');?>">Keluar</a>
                                </li>
                              <?php else:?>
                                <li><a href="<?= \app\models\UrlClass::generateUrl('/site/login');?>">Masuk</a>
                                </li>
                              <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
				              <?php if(!\yii::$app->user->isGuest):?>
                                <li><a>Selamat Datang!, <b><?= (\yii::$app->user->identity->userBelongsToUserType) ? \yii::$app->user->identity->userBelongsToUserType->full_name : null;?></b></a>
                                </li>
                                <li><a href="#">Status : <b>Guru</b></a>
				              <?php endif;?>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
				              <?php if(!\yii::$app->user->isGuest):?>
                                <li><a data-method="post" href="<?= \app\models\UrlClass::generateUrl('logout');?>">Keluar</a>
                                </li>
                              <?php else:?>
                                <li><a href="<?= \app\models\UrlClass::generateUrl('/site/login');?>">Masuk</a>
                                </li>
				              <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="/"><img src="/templates/maindashboard/images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li class="admi-menu">
                                    <a href="#" class="mm-arr">Input Materi & Bank Soal</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="admi-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="/student/elearning">
                                                            <img src="/templates/maindashboard/images/blog.png" alt="">
                                                            
                                                        </a>
                                                    </div>
                                                    <h3><span class="text-red">Tahukah Kamu ?</span></h3>
                                                    <p>Siswa dapat membaca berbagai informasi kejadian sehari-hari dari materi pelajaran yang diunggah oleh guru</p>
                                                    <a href="/dashboard/elearning" class="mm-r-m-btn">Buka Halaman</a>
                                                </div>
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="/student/elearning">
                                                            <img src="/templates/maindashboard/images/logobuku.png" alt="">
                                                            
                                                        </a>
                                                    </div>
                                                    <h3><span class="text-red">Membuat Materi Pelajaran</span></h3>
                                                    <p>Guru dapat membuat materi-materi sebagai bahan ajar online berbasis Web</p>
                                                    <a href="/dashboard/elearning" class="mm-r-m-btn">Buka Halaman</a>
                                                </div>
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="/student/simulation">
                                                            <img src="/templates/maindashboard/images/simulasi.jpeg" alt="">
                                                        </a>
                                                    </div>
                                                    <h3><span class="text-red">Mengunggah Simulasi Materi Pelajaran</span></h3>
                                                    <p>Guru dapat mengunggah berbagai simulasi yang interaktif dari materi pelajaran</p>
                                                    <a href="/dashboard/simulation" class="mm-r-m-btn">Buka Halaman</a>
                                                </div>
<!--                                                 <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="/student/quiz">
                                                            <img src="/templates/maindashboard/images/banksoal.png" alt="">
                                                        </a>
                                                    </div>
                                                    <h3><span class="text-red">Membuat Bank Soal Latihan</span></h3>
                                                    <p>Guru dapat membuat soal-soal di sini sebagai media belajar online berbasis Web</p>
                                                    <a href="/dashboard/banksoal" class="mm-r-m-btn">Buka Halaman</a>
                                                </div> -->
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="/student/quiz">
                                                            <img src="/templates/maindashboard/images/banksoal.png" alt="">
                                                        </a>
                                                    </div>
                                                    <h3><span class="text-red">Membuat Bank Soal Quiz</span></h3>
                                                    <p>Guru dapat membuat soal-soal di sini sebagai media belajar online berbasis Web</p>
                                                    <a href="/dashboard/quiz" class="mm-r-m-btn">Buka Halaman</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="/dashboard/results">Hasil Belajar Siswa</a>
                                </li>
                                <li><a href="/profile">Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
    </section>
    <!--END HEADER SECTION-->