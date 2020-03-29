          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGASI UTAMA</li>

          	<li class="<?= \app\models\HelpersClass::isMenuActive(['student/elearning','student/quiz']);?> treeview">
	            <a href="#">
	              <i class="fa fa-book"></i>
	              <span>MATERI & LATIHAN</span>
	              <span class="pull-right-container">
	                <i class="fa fa-angle-left pull-right"></i>
	              </span>
	            </a>
	            <ul class="treeview-menu">
	              <li class="<?= \app\models\HelpersClass::isMenuActive(['student/elearning']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['student/elearning']);?>"><i class="fa fa-book"></i> MATERI</a></li>
	              <li class="<?= \app\models\HelpersClass::isMenuActive(['student/quiz']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['student/quiz']);?>"><i class="fa fa-book"></i> SOAL</a></li>
	            </ul>
	        </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>PENGATURAN AKUN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['password']);?>"><i class="fa fa-circle-o"></i> GANTI PASSWORD</a></li>
              </ul>
            </li>
            <li class="<?= \app\models\HelpersClass::isMenuActive(['adminmanage/email']);?> treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>HASIL BELAJAR</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= \app\models\HelpersClass::isMenuActive(['student/results']);?>"><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['student/results']);?>"><i class="fa fa-book"></i> DAFTAR NILAI</a></li>
              </ul>
            </li>
 
          </ul>