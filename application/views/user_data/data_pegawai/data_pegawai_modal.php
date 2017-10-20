Modal -->
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
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_pegawai"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NID</label>
                            <div class="col-md-9">                               
                                <input name="nid" placeholder=" nid" max="20" maxlength="20" readonly="" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">                                
                                <input name="nama" placeholder=" nama" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">                                
                                <input name="tempat_lahir" placeholder=" tempat_lahir" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">                                
                                <input name="tanggal_lahir" placeholder=" tanggal_lahir" max="50" maxlength="50" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-9">
                                <select name="agama" class="form-control">
                                    <option value="Islam">Islam</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Khatolic">Khatolic</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    option
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Perkawinan</label>
                            <div class="col-md-9">
                                <select name="status_perkawinan" class="form-control">
                                    <option value="" selected="" disabled="">-- Pilih Status Perkawinan --</option>
                                    <option value="0">Belum Kawin</option>
                                    <option value="1">Sudah Kawin</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">                                
                                <input name="email" placeholder=" email" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No. Telpon</label>
                            <div class="col-md-9">                                
                                <input name="no_telp" placeholder=" no_telp" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No. Rekening</label>
                            <div class="col-md-9">                                
                                <input name="no_rekening" placeholder=" no_rekening" max="50" maxlength="50" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NPWP</label>
                            <div class="col-md-9">                                
                                <input name="npwp" placeholder=" npwp" max="100" maxlength="100" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">                                
                                <input name="alamat" placeholder=" alamat" max="200" maxlength="200" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cost Center</label>
                            <div class="col-md-9">                                
                                <input name="cost_center" placeholder=" cost_center" readonly="" max="200" maxlength="200" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Kepegawaian</label>
                            <div class="col-md-9">                                
                                <input name="status_kepegawaian" readonly="" placeholder=" status_kepegawaian" max="200" maxlength="200" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Shift</label>
                            <div class="col-md-9">                                
                                <input name="shift" placeholder=" shift" readonly="" max="200" maxlength="200" class="form-control" type="text" required="">
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
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                                <input name="tempat_lahirs" placeholder=" tempat_lahir" max="50" maxlength="50" class="form-control " type="text" required="">
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
<!-- End Bootstrap modal -->