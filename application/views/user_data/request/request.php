        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Permintaan Judul Pelatihan</h3>
          </div>
          <div class="box-body">
<!-- /.col-lg-12 -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        

                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="col-md-12">
                              <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a href="#MenungguApproval" data-toggle="tab">Menunggu Approval</a></li>
                                  <li><a href="#Realisasi" data-toggle="tab">Realisasi</a></li>
                                  <!-- <li><a href="#Pelatihan" data-toggle="tab">Pelatihan</a></li> -->
                                </ul>
                                <div class="tab-content">
                                  <div class="active tab-pane" id="MenungguApproval">
                                    <!--  MenungguApproval -->
                                      <div class="box box-widget widget-user-2">
                                        <div class="box-footer no-padding">
                                            <div class="box-header">
                                              <button class="btn btn-primary" id="btnAddPel" onclick="add()"><span class="fa fa-plus"></span>&nbsp; Tambah</button>
                                              <hr>
                                            </div>
                                                <table class="table table-striped table-bordered table-hover" id="request_pelatihan">
                                                    <thead>
                                                        <tr>
                                                            <th>Judul Pelatihan</th>
                                                            <th>Peserta</th>
                                                            <th>Status Pelatihan</th>
                                                            <th width="90px">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                        </div>
                                      </div>                
                                    <!-- / MenungguApproval -->
                                  </div>
                                  <!-- /.tab-pane -->
                                  <div class="tab-pane" id="Realisasi">
                                  <!--  Realisasi -->
                                    <div class="box box-widget widget-user-2"> <br>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="pelatihan_realisasi">
                                                    <thead>
                                                        <tr>
                                                            <th>nid</th>
                                                            <th>Judul Pelatihan</th>
                                                            <th>Jumlah Peserta</th>
                                                            <th>Peserta Realisasi</th>
                                                            <!-- <th>Lembaga Pelatihan</th>
                                                            <th>Pelaksanaan Awal</th>
                                                            <th>Pelaksanaan Pkhir</th> -->
                                                            <th>Status</th>
                                                            <!-- <th width="90px">act</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                    </div>                
                                  <!-- / Realisasi -->
                                  </div>
                                  <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                              </div>
                              <!-- /.nav-tabs-custom -->
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                </div>

          </div>
          <!-- /.box-body -->
        </div>