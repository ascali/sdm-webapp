<!-- Modal -->
<script type="text/javascript">
    // var edit="";
    // var del="";
</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form" id="modalFixed">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_pegawai"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nid</label>
                            <div class="col-md-9">
                                <input name="nid" placeholder="nid" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder=" Nama" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status kepegawaian</label>
                            <div class="col-md-9">
                                
                                <!--<input type="text" name="status_kepegawaian" max="20" maxlength="20" placeholder="status kepegawaian" class="form-control" required="">-->
                                <select name="id_status" class="form-control" id="id_status"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Perkawinan</label>
                            <div class="col-md-9">
                                <select name="status_perkawinan" class="form-control" id="status_perkawinan">
                                    <option value="" selected="" disabled="">-- Pilih Status Perkawinan --</option>
                                    <option value="0">Belum Kawin</option>
                                    <option value="1">Sudah Kawin</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Grade</label>
                            <div class="col-md-9">
                                <input type="text" name="grade" max="20" maxlength="20" placeholder="grade" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Skala</label>
                            <div class="col-md-9">
                                <input type="text" name="skala" max="20" maxlength="20" placeholder="skala" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Devisi</label>
                            <div class="col-md-9">
                                <input type="text" name="devisi" max="20" maxlength="20" placeholder="devisi" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Shift</label>
                            <div class="col-md-9">
                                <input type="text" name="shift" max="20" maxlength="20" placeholder="shift" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bidang</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="id_bidang" max="20" maxlength="20" placeholder="bidang" class="form-control" required=""> -->
                                <select name="id_bidang" class="form-control" id="id_bidang"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="id_level" max="20" maxlength="20" placeholder="level" class="form-control" required=""> -->
                                <select name="id_level" class="form-control" id="id_level"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="id_pendidikan" max="20" maxlength="20" placeholder="Pendidikan" class="form-control" required=""> -->
                                <select name="id_pendidikan" class="form-control" id="id_pendidikan"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat" max="20" maxlength="20" placeholder="Alamat" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tempat_lahir" max="20" maxlength="20" placeholder="Tempat lahir" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal lahir</label>
                            <div class="col-md-9">
                                <input type="text" name="tanggal_lahir" max="20" maxlength="20" placeholder="tanggal lahir" class="form-control datepicker" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal masuk</label>
                            <div class="col-md-9">
                                <input type="text" name="tanggal_masuk" max="20" maxlength="20" placeholder="tanggal masuk" class="form-control datepicker" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tetap</label>
                            <div class="col-md-9">
                                <input type="text" name="tetap" max="20" maxlength="20" placeholder="tetap" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No telp</label>
                            <div class="col-md-9">
                                <input type="text" name="no_telp" max="20" maxlength="20" placeholder="nomor telpon / handphone" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="email" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No rekening</label>
                            <div class="col-md-9">
                                <input type="text" name="no_rekening" max="20" maxlength="20" placeholder="nomor rekening" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NPWP</label>
                            <div class="col-md-9">
                                <input type="text" name="npwp" max="20" maxlength="20" placeholder="npwp" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cost center</label>
                            <div class="col-md-9">
                                <input type="text" name="cost_center" max="20" maxlength="20" placeholder="cost center" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-9">
                                <input type="text" name="agama" max="20" maxlength="20" placeholder="agama" class="form-control" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="foto">
                            <label class="control-label col-md-3">Foto</label>
                            <div class="col-md-9">
                                (Tidak ada foto)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Unggah Foto </label>
                            <div class="col-md-9">
                                <input name="foto" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary update-button">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_detail" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form" id="modalFixed">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_pegawai"/>
                </form>
                <div class="panel panel-info">
                  <div class="panel-body">
                  <!-- Select Data -->
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
                            <div class="widget-user-image" id="imgPhoto">
                                <!-- <img class="img-circle" src="<?=base_url()?>public/dist/img/user7-128x128.jpg" alt="User Avatar"> -->
                                <!-- <h4>Foto Pegawai</h4> -->
                            </div>
                            <div class="box-footer no-padding">
                              <!-- Basic panel example -->
                                <!-- Table -->
                                  <table class="table table-striped table-bordered table-hover" id="detail">
                                    <tr>
                                        <td>a</td>
                                        <td>b</td>
                                    </tr>
                                    <tr>
                                        <td>a</td>
                                        <td>c</td>
                                    </tr>
                                  </table>
                            </div>
                          </div>                
                        <!-- / Detail -->
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="Keluarga">
                      <!--  Keluarga -->
                        <div class="box box-widget widget-user-2">
                          <div class="widget-user-header bg-blue">
                            <div class="widget-user-image" id="btnKel">
                              <!-- <a href="#" class="btn btn-default btn-block" id="update_kel" onclick="edit_keluarga(<?=$_SESSION['id_pegawai']?>)"><b>Update Data Keluarga</b></a> -->
                              
                            </div>
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
                  <!-- End Select Data -->
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="window.location.reload();" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->




<!-- Modal Keluarga -->
<div class="modal fade" id="modal_form_keluarga" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_keluarga" class="form-horizontal">
                    <input type="hidden" value="" name="id_pegawais"/>
                    <input type="hidden" value="" name="id_keluargas"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Pernikahan</label>
                            <div class="col-md-9">
                                <select name="statuss" class="form-control">
                                    <option value="Istri">Istri</option>
                                    <option value="Suami">Suami</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pasangan</label>
                            <div class="col-md-9">                                
                                <input name="nama_pasangans" placeholder=" nama_pasangan" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">                                
                                <input name="tempat_lahirs" placeholder=" tempat_lahir" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">                                
                                <input name="tanggal_lahirs" placeholder=" tanggal_lahir" max="50" maxlength="50" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>            
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_keluarga()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End Bootstrap modal -->

<!-- Modal Anak  -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_anak" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_anak" class="form-horizontal">
                    <input type="hidden" value="" name="id_pegawaia"/> 
                    <input type="hidden" value="" name="id_anak"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Anak Ke</label>
                            <div class="col-md-9">                               
                                <input name="anakke" placeholder=" anak ke" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">                                
                                <input name="nama_anak" placeholder=" nama anak" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">                                
                                <input name="tempat_lahir_a" placeholder=" tempat lahir" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">                                
                                <input name="tanggal_lahir_a" placeholder=" tanggal lahir" max="20" maxlength="20" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_anak()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- set up the modal to start hidden and fade in and out -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        Hello world!
      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
    </div>
  </div>
</div>

<!-- End Bootstrap modal

