    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image id_photo">
          <!-- <img src="<?=base_url()?>public/dist/img/user2-160x160.jpg" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['username']?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        <br>
        <br>
      </div>

      <!-- search form (Optional) -->

      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
        <!-- Optionally, you can add icons to the links class="active" -->
        <li><a href="<?=base_url()?>administrator/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if ($_SESSION['level'] == 'Administrator'): ?>
        <li><a href="<?=base_url()?>administrator/users"><i class="fa fa-user"></i> <span>User</span></a></li>
        <li><a href="<?=base_url()?>administrator/berita"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a></li>
        <?php endif ?>
        <?php if ($_SESSION['level'] == 'Administrator' || $_SESSION['level'] == 'Operator Pegawai'): ?>
        <li><a href="<?=base_url()?>administrator/level"><i class="fa fa-bars"></i> <span>Jabatan</span></a></li>
        <li><a href="<?=base_url()?>administrator/bidang"><i class="glyphicon glyphicon-link"></i> <span>Bidang</span></a></li>
        <li><a href="<?=base_url()?>administrator/status_kepegawaian"><i class="fa fa-building"></i> <span>Status Kepegawaian</span></a></li>
        <li><a href="<?=base_url()?>administrator/pendidikan"><i class="fa fa-graduation-cap"></i> <span>Pendidikan</span></a></li>
        <li><a href="<?=base_url()?>administrator/pegawai"><i class="glyphicon glyphicon-briefcase"></i> <span>Pegawai</span></a></li>
        <?php endif ?>

        <!-- <hr> -->
        <?php if ($_SESSION['level'] == 'Administrator' || $_SESSION['level'] == 'Operator Pelatihan'): ?>
        <li><a href="<?=base_url()?>administrator/pelatihan"><i class="fa fa-bar-chart"></i> <span>Pelatihan</span></a></li>
        <li><a href="<?=base_url()?>administrator/sertifikasi"><i class="fa fa-certificate"></i> <span>Sertifikasi</span></a></li> 
        <?php endif ?>

        <li><a href="<?=base_url()?>administrator/report"><i class="fa fa-book"></i> <span><i>Report</i></span></a></li> 
        
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Master Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>administrator/keluarga"><i class="fa fa-users"></i> <span>Keluarga</span></a></li>
            <li><a href="<?=base_url()?>administrator/anak"><i class="fa fa-child"></i> <span>Anak</span></a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->