        
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pelatihan</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-sm btn-primary" onclick="add()">Add New</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="col-md-12">
                              <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a href="#MenungguApproval" data-toggle="tab">Menunggu Approval</a></li>
                                  <li><a href="#Realisasi" data-toggle="tab">Realisasi</a></li>
                                  <li><a href="#Pelatihan" data-toggle="tab">Pelatihan</a></li>
                                </ul>
                                <div class="tab-content">
                                  <div class="active tab-pane" id="MenungguApproval">
                                    <!--  MenungguApproval -->
                                      <div class="box box-widget widget-user-2">
                                        <div class="box-footer no-padding"> <br>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="pelatihan">
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
                                                            <th width="90px">act</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
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
                                                            <th>Status Gaps</th>
                                                            <th>Judul Pelatihan</th>
                                                            <th>Jumlah Peserta</th>
                                                            <th>Peserta Realisasi</th>
                                                            <!-- 
                                                            <th>Pelaksanaan Awal</th>
                                                            <th>Pelaksanaan Pkhir</th> -->
                                                            <th>Status</th>
                                                            <th width="90px">act</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                    </div>                
                                  <!-- / Realisasi -->
                                  </div>
                                  <!-- /.tab-pane -->

                                  <div class="tab-pane" id="Pelatihan">
                                    <div class="box box-widget widget-user-2">
                                      <br>
                                      <div class="box-footer no-padding">
                                        <table class="table table-striped table-bordered table-hover" id="pelatihan_realisasi_sukses">
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

        
        <!-- /#page-wrapper -->