     
        <!-- /#page-wrapper -->

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Profil Pegawai</h3>
          </div>
          <div class="box-body">
                <!-- Custom Tabs -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile foto">
              <span id="fotos"></span>
              <!-- <img class="profile-user-img img-responsive img-circle" src="<?=base_url();?>public/images/<?=$_SESSION['foto']?>" alt="User profile picture"> -->

              <h3 class="profile-username text-center namaPeg" id="">Nina Mcintire</h3>

              <!-- <p class="text-muted text-center" id="level_jabatan">Software Engineer</p> -->

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right agama" id="">Islam</a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right level_jabatan" id="level_jabatan">General Manager</a>
                </li>
                <li class="list-group-item">
                  <b>Devisi</b> <a class="pull-right devisi" id="devisi">Risk and Management</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Detail" data-toggle="tab">Detail</a></li>
              <li><a href="#Keluarga" data-toggle="tab" id="kel123">Keluarga</a></li>
              <li><a href="#anak" data-toggle="tab" id="ank123">Anak</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="Detail">
                <!--  Detail -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue">
                      <div class="widget-user-image">
                        <!-- <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar"> -->
                        <a href="#" class="btn btn-default btn-block" onclick="edit(<?=$_SESSION['id_pegawai']?>)"><b>Update Data Profil</b></a>
                      </div>
                      <!-- /.widget-user-image -->
                      <!-- <h3 class="widget-user-username namaPeg">Nadia Carmichael</h3>
                      <h5 class="widget-user-desc level_jabatan">Lead Developer</h5> -->

                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="#">NID <b><span class="pull-right " id="nid"></span></b></a></li>
                        <li><a href="#">Nama Lengkap <b><span class="pull-right " id="namaPeg"></span></b></a></li>
                        <li><a href="#">Tempat Lahir <b><span class="pull-right " id="tempat_lahir"></span></b></a></li>
                        <li><a href="#">Tanggal Lahir <b><span class="pull-right " id="tanggal_lahir"></span></b></a></li>
                        <li><a href="#">Agama <b><span class="pull-right " id="agama"></span></b></a></li>
                        <li><a href="#">Email <b><span class="pull-right " id="email"></span></b></a></li>
                        <li><a href="#">No. Telp <b><span class="pull-right " id="no_telp"></span></b></a></li>
                        <li><a href="#">No. Rekening <b><span class="pull-right " id="no_rekening"></span></b></a></li>
                        <li><a href="#">NPWP <b><span class="pull-right " id="npwp"></span></b></a></li>
                        <li><a href="#">Alamat <b><span class="pull-right " id="alamat"></span></b></a></li>
                        <li><a href="#">Cost Center <b><span class="pull-right " id="cost_center"></span></b></a></li>
                        <li><a href="#">Status Kepegawaian <b><span class="pull-right " id="status_kepegawaian"></span></b></a></li>
                        <li><a href="#">Grade <b><span class="pull-right " id="grade"></span></b></a></li>
                        <li><a href="#">Skala <b><span class="pull-right " id="skala"></span></b></a></li>
                        <li><a href="#">Shift <b><span class="pull-right " id="shift"></span></b></a></li>
                      </ul>
                    </div>
                  </div>                
                <!-- / Detail -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="Keluarga">
              <!--  Keluarga -->
                <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                      <a href="#" class="btn btn-default btn-block" id="update_kel" onclick="edit_keluarga(<?=$_SESSION['id_pegawai']?>)"><b>Update Data Keluarga</b></a>
                        <a href="#" class="btn btn-default btn-block" id="add_kel" onclick="add_keluarga()"><b>Tambah Data Keluarga</b></a>
                    </div>
                    <!-- /.widget-user-image -->
                  </div>
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                      <li><a href="#">Status Pasangan<b><span class="pull-right" id="statusPasangan"></span></b></a></li>
                      <li><a href="#">Nama Pasangan <b><span class="pull-right" id="nama_pasangan"></span></b></a></li>
                      <li><a href="#">Tempat Lahir Pasangan<b><span class="pull-right" id="tempat_lahir_p"></span></b></a></li>
                      <li><a href="#">Tanggal Lahir Pasangan<b><span class="pull-right" id="tanggal_lahir_p"></span></b></a></li>
                    </ul>
                  </div>
                </div>                
              <!-- / Keluarga -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="anak">
                <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                      <a href="#" class="btn btn-default btn-block" onclick="add_anak()"><b>Tambah</b></a>
                    </div>
                    <!-- /.widget-user-image -->
                  </div>
                  <div class="box-footer no-padding">
                    <table class="table table-striped table-bordered table-hover" id="data_anak">
                    <thead>
                            <tr>
                                <th>Anak Ke</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th width="90px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                  </div>
                </div> 
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
          </div>
          <!-- /.box-body -->
        </div>