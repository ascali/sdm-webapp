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
                    <input type="hidden" value="" name="id_pendidikan"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan Terakhir</label>
                            <div class="col-md-9">                               
                                <input name="pendidikan_terakhir" placeholder=" pendidikan terakhir" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Tahun Lulus</label>
                            <div class="col-md-9">                               
                                <input name="tahun_lulus" placeholder=" tahun lulus" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>  -->          
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