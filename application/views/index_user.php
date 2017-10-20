<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SDM | Staff</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url();?>public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bootstrap-datepicker/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bootstrap-datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bootstrap-sweetalert-master/dist/sweetalert.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>public/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>public/dist/css/skins/_all-skins.min.css">
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
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav fixed">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?=base_url();?>" class="navbar-brand"><b>SDM</b>&nbsp;Management</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="<?=base_url()?>index">Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="<?=base_url()?>index/berita">Berita</a></li>
            <li><a href="<?=base_url()?>index/data_pegawai">Data Pegawai</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelatihan & Sertifikasi <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>index/request_judul">Request</a></li>
                <li><a href="<?=base_url()?>index/sertifikasi">Sertifikasi</a></li>
                <li><a href="<?=base_url()?>index/history">History</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prosedur <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>public/unduh_form/form_iso.zip">Unduh Form ISO</a></li>
                <li><a href="<?=base_url()?>index/tna">TNA</a></li>
              </ul>
            </li>

          </ul>

        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <span class="id_photos"></span>
                <!-- <img src="<?=base_url();?>public/images/<?=$_SESSION['foto']?>" class="user-image" alt="User Image"> -->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?=$_SESSION['nama']?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header id_photos">
                  <!-- <img src="<?=base_url();?>public/images/<?=$_SESSION['foto']?>" class="img-circle" alt="User Image"> -->

                  <p>
                    <?=$_SESSION['nama']?> - <?=$_SESSION['level']?>
                    <small>Member since <?=$_SESSION['created']?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" onclick="gantipass();" class="btn btn-default btn-flat">Ganti Password </a>
                  </div>
                  <div class="pull-right">
                    <a href="#" onclick="logout();" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">
      <?php $this->load->view($content); ?>
      </section>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal All -->
    <?php $this->load->view($modals); ?>

<!-- Modal Ganti Password  -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_pass" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_pass" name="form_pass" method="post" class="form-horizontal">
                    <input type="hidden" value="<?= $_SESSION['id_admin']?>" name="id_admin"/> 
                    <!-- <input type="hidden" value="" name="ganti_pass"/>  -->
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Password Baru <font color="red">*</font></label>
                            <div class="col-md-9">                                
                                <input name="passwords" placeholder=" Password Baru" max="20" maxlength="20" class="form-control" type="password" required="" id="passwords">
                                <span class="help-block"></span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Konfirmasi Password Baru <font color="red">*</font></label>
                            <div class="col-md-9">                                
                                <input name="confirmpassword" placeholder=" Konfirmasi Password Baru" max="20" maxlength="20" class="form-control" type="password" required="" id="confirmpassword">
                                <span class="help-block"></span>
                            </div>
                        </div>             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="ganti_passw();" class="btn btn-primary">Ganti Password</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.7
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Maya</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url();?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url();?>public/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/js/notify.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>public/bootstrap/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url();?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>public/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>public/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>public/dist/js/demo.js"></script>

<script src="<?php echo base_url('public/module_users/'.$modules.'.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/module_users/ganti_pass.js'); ?>" type="text/javascript"></script>

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
      var photoIDs = "";

      $.getJSON(base_url+'index/data_pegawai_data', function(dataPegPhoto){
        console.log(dataPegPhoto.data);

        var data = dataPegPhoto.data;
        for (var i = 0; i < data.length; i++) {
            photoIDs += '<img src="<?=base_url();?>public/images/'+data[i].foto+'" width="20px" height="20px" class="img-circle" alt="User Image">';
        }
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
</body>
</html>
