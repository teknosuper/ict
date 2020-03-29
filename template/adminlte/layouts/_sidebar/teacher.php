          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGASI UTAMA</li>

            <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/quiz','dashboard/elearning']);?> treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>MATERI & SOAL</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/quiz']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['dashboard/quiz']);?>"><i class="fa fa-book"></i> UNGGAH SOAL & LATIHAN</a></li>
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/elearning']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['dashboard/elearning']);?>"><i class="fa fa-book"></i> UNGGAH MATERI</a></li>
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
                <li><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['password']);?>"><i class="fa fa-circle-o"></i> GANTI SANDI</a></li>
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
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/results']);?>"><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['dashboard/results']);?>"><i class="fa fa-book"></i> DAFTAR NILAI</a></li>
              </ul>
            </li>

          </ul>