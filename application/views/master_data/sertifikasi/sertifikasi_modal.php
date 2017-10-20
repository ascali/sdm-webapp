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
                    <input type="hidden" value="" name="id_sertifikasi"/>  
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NID Pegawai</label>
                            <div class="col-md-9">
                                <select name="id_pegawai" class="form-control" id="id_pegawai"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Sertifikasi</label>
                            <div class="col-md-9">                               
                                <input name="nama_sertifikasi" placeholder="nama" max="40" maxlength="40" class="form-control" type="text" required=">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jabatan</label>
                            <div class="col-md-9">
                                <select name="id_level" class="form-control" id="id_level"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bidang</label>
                            <div class="col-md-9">
                                <select name="id_bidang" class="form-control" id="id_bidang"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lembaga Sertifikasi</label>
                            <div class="col-md-9">                                
                                <input name="lembaga_sertifikasi" placeholder=" lembaga_sertifikasi" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Epaired Awal</label>
                            <div class="col-md-9">                                
                                <input name="tanggal_expaired_awal" placeholder=" tanggal_expaired_awal" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Expired Akhir</label>
                            <div class="col-md-9">                                
                                <input name="tanggal_expired_akhir" placeholder=" tanggal_expired_akhir" class="form-control datepicker" type="text" required="">
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
<!-- End Bootstrap modal -->