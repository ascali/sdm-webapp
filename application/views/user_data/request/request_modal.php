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
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <div class="form-body">
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
<div class="modal fade" id="modal_form_realisasi_peserta" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  onclick="window.location.reload();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <div id="btnAddRelPel"></div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="peserta_pelatihan_realisasi_data_tables">
                    <thead>
                            <tr>
                                <!-- <th>Cetak</th> -->
                                <th>Attachment</th>
                                <th>NID</th>
                                <th>Nama</th>
                                <th>Judul Pelatihan</th>
                                <th>Gaps</th>
                                <th>Kompetensi</th>
                                <th>P. Awal</th>
                                <th>P. Akhir</th>
                                <th>Lembaga Pelatihan</th>
                                <th>Status Pelatihan</th>
                                <!-- <th width="90px">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                                
                <form action="#" id="form_realisasi_peserta" class="form-horizontal">
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <!-- <div class="form-body">
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
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-danger" onclick="window.location.reload();" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_realisasi_peserta_pel" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_realisasi_peserta_pel" class="form-horizontal">
                    <input type="hidden" value="" name="id_peserta"/> 
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <input type="hidden" value="" name="id_pegawaipel"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">ID / NID / Nama Pegawai</label>
                            <div class="col-md-9">                               
                                <!-- <input name="id_pegawai" placeholder=" NID / Nama" max="100" maxlength="100" class="form-control" type="text" required=""> -->
                                <select name="id_pegawai_pel" id="id_pegawai_pel" class="form-control">
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul Pelatihan</label>
                            <div class="col-md-9">                               
                                <input name="judul_pelatihan" placeholder=" judul_pelatihan" readonly="" max="20" maxlength="20" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kompetensi</label>
                            <div class="col-md-9">                                
                                <!-- <input name="id_bidang" placeholder=" jenis kompetensi" max="100" maxlength="100" class="form-control" type="text" required=""> -->

                                <select name="id_bidang_pel" id="id_bidang_pel" class="form-control">
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="control-label col-md-3">History Pelatihan</label>
                            <div class="col-md-9">
                                <textarea name="history_pelatihan" class="form-control"></textarea>                                
                                <!-- <input name="history_pelatihan" placeholder=" history_pelatihan" max="100" maxlength="100" class="form-control" type="text" required=""> -->
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Attachment</label>
                            <div class="col-md-9">                               
                                <input name="form_pelatihan" placeholder="  form_pelatihan" type="file" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>  -->         
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_peserta_pelatihan()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->

<div class="modal fade" id="modal_form_gaps" role="dialog"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_gaps" class="form-horizontal">
                    <input type="hidden" value="" name="id_peserta"/> 
                    <input type="hidden" value="" name="id_pelatihan"/> 
                    <input type="hidden" value="" name="id_pegawaipel"/> 
                    <div class="form-body">
                        <div class="form-group" id="form_pelatihan">
                            <label class="control-label col-md-3">File Dir</label>
                            <div class="col-md-9">
                                (Tidak ada File, hanya file PDF)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Attachment</label>
                            <div class="col-md-9">                               
                                <input name="form_pelatihan" placeholder="  form_pelatihan" type="file" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>          
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_peserta_pelatihan_gaps()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->