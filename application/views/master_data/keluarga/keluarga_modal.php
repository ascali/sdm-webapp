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
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_keluarga"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pegawai</label>
                            <div class="col-md-9">                               
                                <!-- <input name="id_pegawai" placeholder="Pegawai" max="20" maxlength="20" class="form-control" type="text" required=""> -->
                                <select name="id_pegawai" class="form-control" id="id_pegawai"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">                               
                                <input name="status" placeholder="Status" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pasangan</label>
                            <div class="col-md-9">                               
                                <input name="nama_pasangan" placeholder="Pasangan" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-9">                               
                                <input name="tempat_lahir" placeholder="Tempat Lahir Pasangan" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">                               
                                <input name="tanggal_lahir" placeholder="Tanggal Lahir Pasangan" max="20" maxlength="20" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Anak</label>
                            <div class="col-md-9">                               
                                <!-- <input name="id_anak" placeholder="Anak" max="20" maxlength="20" class="form-control" type="text" required=""> -->
                                <select name="id_anak" class="form-control" id="id_anak"></select>
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