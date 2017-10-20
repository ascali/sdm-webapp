      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report</h3>
              <br>
              <!-- <button class="btn btn-primary" onclick="add()"><span class="fa fa-plus"></span>&nbsp; Tambah</button> -->
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <form action="<?=base_url('generate/report')?>" method="post" accept-charset="utf-8">
                  <div class="form-group">
                    <label for="sel1"><font color="red"><b>*</b></font>  Laporan Berdasarkan : </label>
                    <select class="form-control" id="sel1" name="datareport">
                      <option value="bidang">Bidang</option>
                      <option value="perusahaan">Perusahaan</option>
                      <option value="pelatihan">Pelatihan</option>
                      <option value="sertifikasi">Sertifikasi</option>
                    </select>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary">Generate</button>
                </form>
                <br>

                  <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_report">Show </button> -->
              </div>
              <!-- <div class="col-md-6">
                <button class="btn btn-primary">Generate Pegawai Berdasarkan Bidang</button>
              </div>
              <br>
              <div class="col-md-6">
                <button class="btn btn-primary">Generate Pegawai Berdasarkan Perusahaan</button>
              </div>
              <br>
              <div class="col-md-6">
                <button class="btn btn-primary">Generate Pegawai Berdasarkan Pelatihan</button>
              </div>
              <br>
              <div class="col-md-6">
                <button class="btn btn-primary">Generate Pegawai Berdasarkan Sertifikasi</button>
              </div>
 -->          
            </div>
                <!-- <table class="table table-striped table-bordered table-hover" id="level">
                    <thead>
                        <tr>
                            <th>Level Jabatan</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th width="90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div> 
        
        <!-- /#page-wrapper -->