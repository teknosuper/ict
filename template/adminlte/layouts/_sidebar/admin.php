          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGASI UTAMA</li>
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
                <li class="<?= \app\models\HelpersClass::isMenuActive(['adminmanage/email']);?>"><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['email']);?>"><i class="fa fa-book"></i> DAFTAR NILAI</a></li>
              </ul>
            </li>
            <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/masterschool','dashboard/students','dashboard/teachers','dashboard/classroom','dashboard/mastersubjects']);?> treeview">
              <a href="#">
                <i class="fa fa-plus"></i> <span>INPUT DATA</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/masterschool']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['dashboard/masterschool']);?>"><i class="fa fa-user"></i> DATA SEKOLAH</a></li>
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/students']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['dashboard/students']);?>"><i class="fa fa-user"></i> DATA SISWA</a></li>
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/teachers']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['dashboard/teachers']);?>"><i class="fa fa-user"></i> DATA GURU</a></li>
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/classroom']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard',['dashboard/classroom']);?>"><i class="fa fa-user"></i> DATA KELAS</a></li>
                <li class="<?= \app\models\HelpersClass::isMenuActive(['dashboard/mastersubjects']);?>"><a href="<?= \app\models\UrlClass::generateUrl('dashboard/mastersubjects',['dashboard/mastersubjects']);?>"><i class="fa fa-user"></i> DATA MATA PELAJARAN</a></li>
              </ul>
            </li>
            <li class="<?= \app\models\HelpersClass::isMenuActive(['adminmanage/managemenu','adminmanage/managepage','adminmanage/masterscript','adminmanage/hostname','adminmanage/header','filemanager']);?> treeview">
              <a href="#">
                <i class="fa fa-gear"></i>
                <span>PENGATURAN SISTEM</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?= \app\models\HelpersClass::isMenuActive(['adminmanage/managemenu']);?>"><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['managemenu']);?>"><i class="fa fa-gear"></i> PENGATURAN NILAI</a></li>
                <li class="<?= \app\models\HelpersClass::isMenuActive(['adminmanage/managepage']);?>"><a href="<?= \app\models\UrlClass::generateUrl('admin_page',['managepage']);?>"><i class="fa fa-gear"></i> PENGATURAN KELAS</a></li>
              </ul>
            </li>
          </ul>