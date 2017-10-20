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
                    <input type="hidden" value="" name="id_admin"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pegawai</label>
                            <div class="col-md-9">
                                <select name="id_pegawai" class="form-control" id="id_pegawai"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">                               
                                <input name="username" placeholder=" username" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">                                
                                <input name="password" placeholder=" password" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-9">                                
                                <!-- <input name="level" placeholder=" level" max="20" maxlength="20" class="form-control" type="text" required=""> -->
                                <select name="level" class="form-control">
                                    <option selected="" disabled="">-- Pilih Level --</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Operator Pegawai">Operator Pegawai</option>
                                    <option value="Operator Pelatihan">Operator Pelatihan</option>
                                </select>
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