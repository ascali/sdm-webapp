var save_method; //for save method string
var table, table_rel, table_rel_pel_suk;
var urlGlobal = 'http://localhost/sdm/';
var sel1 = "", sel2 = "";
$(document).ready(function(){

	 table = $('#pelatihan').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": urlGlobal+"administrator/pelatihan_data",
                        "type": "POST"
                    },
            "aoColumns": [  
                            {
                                "data": "nid"
                            },
                            {
                                "data": "judul_pelatihan"
                            },
                            {
                                "data": "jumlah_peserta"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var jumlah_peserta_realisasi = row.jumlah_peserta_realisasi;
                                    var action = realisasi ? '<a href="#" onclick="realisasi('+id_pelatihan+',true);">&nbsp; '+jumlah_peserta_realisasi+' &nbsp;</a>' : '';
                                    action += realisasi && del ? '&nbsp;&nbsp;' : '';
                                    return action;  
                                }
                            },
                            /*{
                                "data": "jumlah_peserta_realisasi"
                            },*/
                            /*{
                                "data": "lembaga_pelatihan"
                            },
                            {
                                "data": "pelaksanaan_awal"
                            },
                            {
                                "data": "pelaksanaan_akhir"
                            },*/
                            {
                                "data": "status_pelatihan"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var action = edit ? '<a href="#" onclick="edit('+id_pelatihan+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id_pelatihan+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
                            }
                       ]
    });

      table_rel = $('#pelatihan_realisasi').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": urlGlobal+"administrator/pelatihan_realisasi_data",
                        "type": "POST"
                    },
            "aoColumns": [  
                            {
                                "data": "nid"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    if (row.form_pelatihan == null) {
                                       var act = '<center><a href="#"><button id="" class="btn btn-xs btn-danger">&nbsp; <span class="glyphicon glyphicon-remove-sign"></span> &nbsp;</button></a></center>';
                                     } else {
                                       var act = '<center><a href="#"><button id="" class="btn btn-xs btn-success">&nbsp; <span class="glyphicon glyphicon-ok-sign"></span> &nbsp;</button></a></center>';
                                     }
                                    return act;
                                }
                            },
                            {
                                "data": "judul_pelatihan"
                            },
                            {
                                "data": "jumlah_peserta"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var jumlah_peserta_realisasi = row.jumlah_peserta_realisasi;
                                    var action = realisasi ? '<a href="#" >&nbsp; '+jumlah_peserta_realisasi+' &nbsp;</a>' : '';
                                    action += realisasi && del ? '&nbsp;&nbsp;' : '';
                                    return action;  
                                }
                            },
                            /*{
                                "data": "jumlah_peserta_realisasi"
                            },*/
                            /*{
                                "data": "lembaga_pelatihan"
                            },
                            {
                                "data": "pelaksanaan_awal"
                            },
                            {
                                "data": "pelaksanaan_akhir"
                            },*/
                            {
                                "data": "status_pelatihan"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var action = realisasi ? '<a href="#" onclick="realisasi('+id_pelatihan+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += realisasi && success_pelatihan ? '&nbsp;&nbsp;' : '';
                                    action += success_pelatihan ? '<a href="#" onclick="success_pelatihan('+id_pelatihan+',true);"><button class="btn btn-xs btn-success"> Selesai </button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
                            }
                       ]
    });

      table_rel_pel_suk = $('#pelatihan_realisasi_sukses').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": urlGlobal+"administrator/peserta_pelatihan_realisasi_data_all",
                        "type": "POST"
                    },
            "aoColumns": [  
                            {
                                "data": "nid"
                            },
                            {
                                "data": "judul_pelatihan"
                            },
                            {
                                "data": "jumlah_peserta"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var jumlah_peserta_realisasi = row.jumlah_peserta_realisasi;
                                    var action = realisasi ? '<a href="#" >&nbsp; '+jumlah_peserta_realisasi+' &nbsp;</a>' : '';
                                    action += realisasi && del ? '&nbsp;&nbsp;' : '';
                                    return action;  
                                }
                            },
                            /*{
                                "data": "jumlah_peserta_realisasi"
                            },*/
                            /*{
                                "data": "lembaga_pelatihan"
                            },
                            {
                                "data": "pelaksanaan_awal"
                            },
                            {
                                "data": "pelaksanaan_akhir"
                            },*/
                            {
                                "data": "status_pelatihan"
                            }
                            /*{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var action = realisasi ? '<a href="#" onclick="realisasi('+id_pelatihan+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += realisasi && success_pelatihan ? '&nbsp;&nbsp;' : '';
                                    action += success_pelatihan ? '<a href="#" onclick="success_pelatihan('+id_pelatihan+',true);"><button class="btn btn-xs btn-success"> Selesai </button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
                            }*/
                       ]
    });

    $.getJSON(urlGlobal+'administrator/pegawai_data', function(dataSel){
        console.log(dataSel.data);
        var data = dataSel.data;
        $('#id_pegawai_pel').append('<option selected disabled>-- Pilih Pegawaian --</option>');
        for (var i = 0; i < data.length; i++) {
            sel1 += '<option value="'+data[i].id_pegawai+'">NID: '+data[i].nid+', Nama: '+data[i].nama+'</option>';
        }
        $('#id_pegawai_pel').html(sel1);
    });
});

function reload_table()
{
  // window.location.reload()
  table.ajax.reload(null,false); //reload datatable ajax 
}

function add()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Input Pelatihan'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');
}

function edit(id_pelatihan)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : urlGlobal+"administrator/pelatihan_edit_data/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_pelatihan"]').val(dataRow.data.id_pelatihan);
            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            $('[name="judul_pelatihan"]').val(dataRow.data.judul_pelatihan);
            $('[name="jumlah_peserta"]').val(dataRow.data.jumlah_peserta);
            $('[name="jumlah_peserta_realisasi"]').val(dataRow.data.jumlah_peserta_realisasi);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Pelatihan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function realisasi(id_pelatihan)
{
    save_method = 'realisasi';
    $('#form_realisasi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : urlGlobal+"administrator/pelatihan_edit_data/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_pelatihan"]').val(dataRow.data.id_pelatihan);
            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            $('[name="nid"]').val(dataRow.data.nid);
            $('[name="judul_pelatihan"]').val(dataRow.data.judul_pelatihan);
            $('[name="jumlah_peserta"]').val(dataRow.data.jumlah_peserta);
            $('[name="lembaga_pelatihan"]').val(dataRow.data.lembaga_pelatihan);
            $('[name="jumlah_peserta_realisasi"]').val(dataRow.data.jumlah_peserta_realisasi);
            $('[name="pelaksanaan_awal"]').val(dataRow.data.pelaksanaan_awal);
            $('[name="pelaksanaan_akhir"]').val(dataRow.data.pelaksanaan_akhir);
            $('#modal_form_realisasi').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Realisasi Pelatihan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function success_pelatihan(id_pelatihan)
{
    save_method = 'success_pelatihan';
    $('#form_realisasi_success_pelatihan')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : urlGlobal+"administrator/pelatihan_edit_data/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_pelatihan"]').val(dataRow.data.id_pelatihan);
            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            $('[name="nid"]').val(dataRow.data.nid);
            $('[name="judul_pelatihan"]').val(dataRow.data.judul_pelatihan);
            $('[name="lembaga_pelatihan"]').val(dataRow.data.lembaga_pelatihan);
            $('[name="jumlah_peserta_realisasi"]').val(dataRow.data.jumlah_peserta_realisasi);
            $('[name="pelaksanaan_awal"]').val(dataRow.data.pelaksanaan_awal);
            $('[name="pelaksanaan_akhir"]').val(dataRow.data.pelaksanaan_akhir);
            // $('[name="status_pelatihan"]').val(dataRow.data.status_pelatihan);
            $('#modal_form_realisasi_success_pelatihan').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Sukses Realisasi Pelatihan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del(id_pelatihan)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : urlGlobal+"administrator/pelatihan_delete_data/"+ id_pelatihan,
            type: "POST",
            dataType: "JSON",
            success: function(dataRow)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                alert('Success Delete Data');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = urlGlobal+"administrator/pelatihan_insert_data";
    } else {
        url = urlGlobal+"administrator/pelatihan_update_data";
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

            // alert('Success Saving Data Nasabah');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function save_realisasi()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url = urlGlobal+"administrator/pelatihan_save_realisasi_data";

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form_realisasi').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_realisasi').modal('hide');
                $('#modal_form_realisasi_success_pelatihan').modal('hide');
                reload_table();
                table_rel.ajax.reload(null,false);
                table_rel_pel_suk.ajax.reload(null,false);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

            // alert('Success Saving Data Nasabah');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}


function save_realisasi_sukses()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url = urlGlobal+"administrator/success_pelatihan_save_realisasi_data";

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form_realisasi_success_pelatihan').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_realisasi').modal('hide');
                $('#modal_form_realisasi_success_pelatihan').modal('hide');
                reload_table();
                table_rel.ajax.reload(null,false);
                table_rel_pel_suk.ajax.reload(null,false);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

            // alert('Success Saving Data Nasabah');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
