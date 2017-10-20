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
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">ID Pegawai</label>
                            <div class="col-md-9">
                                <select class="form-control" name="id_pegawai" id="id_pegawai_pel"></select>                           
                                <!-- <input name="id_pegawai" placeholder=" id_pegawai" class="form-control" type="text" required=""> -->
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Pelatihan</label>
                            <div class="col-md-9">                               
                                <input name="judul_pelatihan" placeholder=" judul_pelatihan" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Peserta</label>
                            <div class="col-md-9">                                
                                <input name="jumlah_peserta" placeholder=" jumlah_peserta" max="20" maxlength="20" class="form-control" type="text" required="">
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_realisasi" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_realisasi" class="form-horizontal">
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NID Pegawai</label>
                            <div class="col-md-9">                               
                                <input name="nid" placeholder=" nid" readonly="" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Pelatihan</label>
                            <div class="col-md-9">                               
                                <input name="judul_pelatihan" placeholder=" judul_pelatihan" readonly="" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Peserta</label>
                            <div class="col-md-9">                                
                                <input name="jumlah_peserta" placeholder=" jumlah_peserta" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Realisasi Peserta</label>
                            <div class="col-md-9">                                
                                <input name="jumlah_peserta_realisasi" placeholder=" jumlah_peserta_realisasi" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_realisasi()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_realisasi_success_pelatihan" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_realisasi_success_pelatihan" class="form-horizontal">
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <input type="hidden" value="" name="id_pegawai"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NID Pegawai</label>
                            <div class="col-md-9">                               
                                <input name="nid" placeholder=" nid" readonly="" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Pelatihan</label>
                            <div class="col-md-9">                               
                                <input name="judul_pelatihan" placeholder=" judul_pelatihan" readonly="" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lembaga Pelatihan</label>
                            <div class="col-md-9">                                
                                <input name="lembaga_pelatihan" placeholder=" lembaga_pelatihan" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Realisasi Peserta</label>
                            <div class="col-md-9">                                
                                <input name="jumlah_peserta_realisasi" placeholder=" jumlah_peserta_realisasi" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pelaksanaan Aawal</label>
                            <div class="col-md-9">                                
                                <input name="pelaksanaan_awal" placeholder=" pelaksanaan_awal" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pelaksanaa Akhir</label>
                            <div class="col-md-9">                                
                                <input name="pelaksanaan_akhir" placeholder=" pelaksanaan_akhir" class="form-control datepicker" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>         
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_realisasi_sukses()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->