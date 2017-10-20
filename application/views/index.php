<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SDM Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bootstrap-datepicker/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bootstrap-datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bootstrap-sweetalert-master/dist/sweetalert.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>public/ionic/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>public/plugins/datatables/dataTables.bootstrap.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/skins/skin-blue.min.css">
<!-- Highchart -->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<style type="text/css" media="screen">
  .modal-body{
    max-height: calc(100vh - 210px);
    overflow-y: auto;
    background: whitesmoke;
  }
  .sweet-alert{
    background: #ddd;
  }
</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="http://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini fixed sidebar-collapse">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SDM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SDM</b> Management</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <!-- S Menu Side Bar -->
          <?php $this->load->view('module/menu_up_bar');?>
        <!-- E Menu Side Bar -->
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  <!-- S Menu Side Bar -->
    <?php $this->load->view('module/menu_side_bar');?>
  <!-- E Menu Side Bar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SDM Management
        <small>Web Application</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= $this->uri->segment(1); ?></a></li>
        <li class="active"><?= $this->uri->segment(2); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <?php $this->load->view($content); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal All -->
    <?php $this->load->view($modals); ?>
  <!-- Main Footer -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <b>SDM</b> Management
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#"> Maya</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>public/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/js/notify.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>public/bootstrap/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url()?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- <script src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> -->
<script src="<?=base_url()?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url()?>public/dist/js/app.min.js"></script>
<script src="<?=base_url()?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>public/dist/js/demo.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/dist/js/demo.js" type="text/javascript"></script>

<script src="<?php echo base_url('public/modules/'.$modules.'.js'); ?>" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('.example').DataTable( {});
});

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
  <script type="text/javascript">
    function logout() {
        var r = confirm("Anda yakin ingin keluar dari aplikasi?");
        var url = '<?=base_url()?>';
        if (r) {
           window.location.href = url+'login/logout'
        }
    }
    $(document).ready(function(){

      var base_url = 'http://localhost/sdm/';
      var photoID = "", photoIDs = "";

      $.getJSON(base_url+'administrator/data_all_pegawai_data', function(dataPegPhoto){
        console.log(dataPegPhoto.data);

        var data = dataPegPhoto.data;
        for (var i = 0; i < data.length; i++) {
            photoID += '<img src="<?=base_url();?>public/images/'+data[i].foto+'">';
            photoIDs += '<img src="<?=base_url();?>public/images/'+data[i].foto+'" width="20px" height="20px" class="img-circle" alt="User Image">';
        }
        $('.id_photo').append(photoID);
        $('.id_photos').append(photoIDs);
     });

      $('.datepicker').datepicker({
        // format: "dd/mm/yyyy",
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        clearBtn: true,
        language: "id"
      });

    });

  </script>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

</body>
</html>
