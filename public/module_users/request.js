var save_method; //for save method string
var table, table_rel, table_rel_pel, table_rel_pes_pel;
var sel1 = "", sel2 = "";
var base_url = 'http://localhost/sdm/';

$(document).ready(function(){

	 table = $('#request_pelatihan').DataTable( {
		"processing": true,
        "searching": false,
		"order": [],
			"ajax": {
						"url": base_url+"index/request_data",
				        "type": "POST"
		        	},
		    "aoColumns": [	
                            {
                                "data": "judul_pelatihan"
                            },
                            {
                                "data": "jumlah_peserta"
                            },
                            {
                                "data": "status_pelatihan"
                            },
			    			{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var action = edit ? '<a href="#" class="btnEditPel"  onclick="edit('+id_pelatihan+',true);"><button id="" class="btn btn-xs btn-warning btnEditPel">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    // action += del ? '<a href="#" onclick="del('+id_pelatihan+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
			    			}
					   ]
	});

    $.getJSON(base_url+'index/pelatihan_realisasi_data', function(dataPel){
        var data = dataPel.data;
        console.log(data);
        if (data[0].status_pelatihan == 'Realisasi Peserta') {
            $('#btnAddPel').attr('disabled', 'disabled');
        }

        if (data[0].status_pelatihan == 'Menunggu Approval') {
            $('#btnAddPel').attr('disabled', 'disabled');
        }

        if (data.length == 1) {
            $('.btnEditPel').attr('disabled', 'disabled');
        }
    });

      table_rel = $('#pelatihan_realisasi').DataTable( {
        "processing": true,
        "searching": false,
        "order": [],
            "ajax": {
                        "url": base_url+"index/request_realisasi_data",
                        "type": "POST"
                    },
            "aoColumns": [  
                            {
                                "data": "id_pegawai"
                            },
                            {
                                "data": "judul_pelatihan"
                            },
                            {
                                "data": "jumlah_peserta"
                            },
                            {
                                "data": "null",
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var jumlah_peserta_realisasi = row.jumlah_peserta_realisasi;
                                    var action = realisasi_peserta ? '<a href="#" onclick="realisasi_peserta('+id_pelatihan+');" >&nbsp; '+jumlah_peserta_realisasi+' &nbsp;</a>' : '';
                                    action += realisasi_peserta && del ? '&nbsp;&nbsp;' : '';
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
                            /*{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_pelatihan = row.id_pelatihan;
                                    var action = edit ? '<a href="#" onclick="edit('+id_pelatihan+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id_pelatihan+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
                            }*/
                       ]
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
        url : base_url+"index/request_edit_data/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_pelatihan"]').val(dataRow.data.id_pelatihan);
            $('[name="judul_pelatihan"]').val(dataRow.data.judul_pelatihan);
            $('[name="jumlah_peserta"]').val(dataRow.data.jumlah_peserta);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Pelatihan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function realisasi_peserta(id_pelatihan)
{
    save_method = 'realisasi_peserta';
    $('#form_realisasi_peserta')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');
    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/request_realisasi_data/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        { 
            console.log(dataRow);
            $('[name="id_pelatihan"]').val(dataRow.data[0].id_pelatihan);
            $('[name="judul_pelatihan"]').val(dataRow.data[0].judul_pelatihan);
            $('[name="jumlah_peserta"]').val(dataRow.data[0].jumlah_peserta);
            $('#modal_form_realisasi_peserta').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Realisasi Pelatihan : '+dataRow.data[0].judul_pelatihan); // Set title to Bootstrap modal title

            var btnAddRelPel = '<a href="#" id="btnAddPes" onclick="add_realisasi_peserta_pel('+dataRow.data[0].id_pelatihan+')" class="btn btn-primary">Tambah Data Peserta</a>';
            $('#btnAddRelPel').html(btnAddRelPel);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $.getJSON(base_url+'index/peserta_pelatihan_realisasi_data_all/'+id_pelatihan, function(dataAdd){
        var data = dataAdd.data;
        console.log('1 '+ dataAdd.data +' is '+ data.length );
        console.log(data[0].jumlah_peserta_realisasi);
        if (data.length >= data[0].jumlah_peserta_realisasi) {
            $('#btnAddPes').hide();
        } else {
            $('#btnAddPes').show();
        }
    });

            table_rel_pel = $('#peserta_pelatihan_realisasi_data_tables').DataTable({
            "processing": true,
            "searching": false,
            "order": [],
                "ajax": {
                            "url": base_url+"index/peserta_pelatihan_realisasi_data_all/"+id_pelatihan,
                            "type": "POST"
                        },
                "aoColumns": [  
                                /*{
                                    "data": null,
                                    "mRender": function(data, type, row){
                                        var form_pelatihan = row.form_pelatihan;
                                        if (form_pelatihan == null) {
                                           var acti = '<center><a href="#"><button id="" class="btn btn-xs btn-danger" disabled>&nbsp; <span class="glyphicon glyphicon-print"></span> &nbsp;</button></a></center>';
                                         } else {
                                           var acti = '<center><a href="#"><button id="" class="btn btn-xs btn-success">&nbsp; <span class="glyphicon glyphicon-print"></span> &nbsp;</button></a></center>';
                                         }
                                        return acti;
                                    }
                                },*/
                                {
                                    "data": null,
                                    "mRender": function(data, type, row){
                                        var id_pelatihan = row.id_pelatihan;
                                        if (row.form_pelatihan == null) {
                                           var act = '<center><a href="#"><button id="" class="btn btn-xs btn-danger">&nbsp; <span class="glyphicon glyphicon-remove-sign"></span> &nbsp;</button></a></center>';
                                         } else {
                                           var act = '<center><a href="#"><button id="" class="btn btn-xs btn-success">&nbsp; <span class="glyphicon glyphicon-ok-sign"></span> &nbsp;</button></a></center>';
                                         }
                                        return act;
                                    }
                                },
                                {
                                    "data": "nid"
                                },
                                {
                                    "data": 'nama'
                                },
                                {
                                    "data": 'judul_pelatihan'
                                },
                                {
                                    "data": null,
                                    "mRender": function(data, type, row){
                                        var id_pelatihan = row.id_pelatihan;
                                        if (row.form_pelatihan == null) {
                                           var act = '<center><a href="#" onclick="update_gaps('+id_pelatihan+', true)">&nbsp; 0 &nbsp;</a></center>';
                                         } else {
                                           var act = '<center><a href="#" onclick="update_gaps('+id_pelatihan+', true)">&nbsp; 1 &nbsp;</a></center>';
                                         }
                                        return act;
                                    }
                                },
                                {
                                    "data": 'nama_bidang'
                                },
                                {
                                    "data": 'pelaksanaan_awal'
                                },
                                {
                                    "data": 'pelaksanaan_akhir'
                                },
                                {
                                    "data": 'lembaga_pelatihan'
                                },
                                {
                                    "data": 'status_pelatihan'
                                }
                                // {
                                //     "data": null,
                                //     "mRender": function(data, type, row){
                                //         var id_pelatihan = row.id_pelatihan;
                                //         var action = edit_realisasi_peserta_pel ? '<a href="#" class="btnEditPel"  onclick="edit_realisasi_peserta_pel('+id_pelatihan+',true);"><button id="" class="btn btn-xs btn-warning btnEditPel">&nbsp; Edit &nbsp;</button></a>' : '';
                                //         action += edit_realisasi_peserta_pel && del ? '&nbsp;&nbsp;' : '';
                                //         // action += del ? '<a href="#" onclick="del('+id_pelatihan+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                //         action += action == '' ? 'No Action' : '';
                                //         return action;  
                                //     }
                                // }
                           ]
        });
        
          // Peserta Pelatihan realisasi

    /*Ajax load data pada modal lg*/
}

function add_realisasi_peserta_pel(id_pelatihan)
{
    save_method = 'realisasi_peserta_pel';
    $('#form_realisasi_peserta_pel')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/request_realisasi_select_data/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            $('[name="id_pelatihan"]').val(dataRow.data[0].id_pelatihan);
            $('[name="id_peserta"]').val(dataRow.data[0].id_peserta);
            $('[name="id_pegawaipel"]').val(dataRow.data[0].id_pegawai);
            $('[name="judul_pelatihan"]').val(dataRow.data[0].judul_pelatihan);
            $('[name="history_pelatihan"]').val(dataRow.data[0].history_pelatihan);
            $('#modal_form_realisasi_peserta_pel').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Tambah Peserta Pelatihan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $.getJSON(base_url+'index/data_pegawai_data_all', function(dataSel){
        console.log(dataSel.data);
        var data = dataSel.data;
        $('#id_pegawai_pel').append('<option selected disabled>-- Pilih Pegawaian --</option>');
        for (var i = 0; i < data.length; i++) {
            sel1 += '<option value="'+data[i].id_pegawai+'">NID: '+data[i].nid+', Nama: '+data[i].nama+'</option>';
        }
        $('#id_pegawai_pel').html(sel1);
    });

    $.getJSON(base_url+'index/bidang_data', function(dataSel2){
        console.log(dataSel2.data);
        var data = dataSel2.data;
        $('#id_bidang_pel').append('<option selected disabled>-- Pilih Kompetensi --</option>');
        for (var i = 0; i < data.length; i++) {
            sel2 += '<option value="'+data[i].id_bidang+'"> '+data[i].nama_bidang+' </option>';
        }
        $('#id_bidang_pel').html(sel2);
    });
}

function edit_realisasi_peserta_pel(id_pelatihan)
{
    save_method = 'edit_realisasi_peserta_pel';
    $('#form_realisasi_peserta_pel')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/peserta_pelatihan_realisasi_data_all/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            $('[name="id_peserta"]').val(dataRow.data[0].id_peserta);
            $('[name="id_pelatihan"]').val(dataRow.data[0].id_pelatihan);
            $('[name="id_pegawaipel"]').val(dataRow.data[0].id_pegawai);
            $('[name="judul_pelatihan"]').val(dataRow.data[0].judul_pelatihan);
            $('[name="history_pelatihan"]').val(dataRow.data[0].history_pelatihan);
            $('#modal_form_realisasi_peserta_pel').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Tambah Peserta Pelatihan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $.getJSON(base_url+'index/data_pegawai_data_all', function(dataSel){
        console.log(dataSel.data);
        var data = dataSel.data;
        $('#id_pegawai_pel').append('<option selected disabled>-- Pilih Pegawaian --</option>');
        for (var i = 0; i < data.length; i++) {
            sel1 += '<option value="'+data[i].id_pegawai+'">NID: '+data[i].nid+', Nama: '+data[i].nama+'</option>';
        }
        $('#id_pegawai_pel').html(sel1);
    });

    $.getJSON(base_url+'index/bidang_data', function(dataSel2){
        console.log(dataSel2.data);
        var data = dataSel2.data;
        $('#id_bidang_pel').append('<option selected disabled>-- Pilih Kompetensi --</option>');
        for (var i = 0; i < data.length; i++) {
            sel2 += '<option value="'+data[i].id_bidang+'"> '+data[i].nama_bidang+' </option>';
        }
        $('#id_bidang_pel').html(sel2);
    });
}

function update_gaps(id_pelatihan) 
{
    save_method = 'update_gapss';
    $('#form_gaps')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.update-button').text('Update');


    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/peserta_pelatihan_realisasi_data_all/" + id_pelatihan,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            $('[name="id_peserta"]').val(dataRow.data[0].id_peserta);
            $('[name="id_pelatihan"]').val(dataRow.data[0].id_pelatihan);
            $('[name="id_pegawaipel"]').val(dataRow.data[0].id_pegawai);

            $('#modal_form_gaps').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Gaps'); // Set title to Bootstrap modal title

            $('#form_pelatihan').show(); // show photo preview modal

            if(dataRow.data.form_pelatihan)
            {
                $('#label-gaps').text('Ganti'); // label photo upload
                $('#form_pelatihan div .abc').html(' '+base_url+'public/images/'+dataRow.data.form_pelatihan+' '); // show photo
                $('#form_pelatihan div').append('<input type="checkbox" name="remove_gambar_gaps" value="'+dataRow.data.form_pelatihan+'"/> Centang jika di ingin dihapus'); // remove photo
                $('#modalFixed').addClass('modal-bodys');
            }
            else
            {
                $('#label-gaps').text('Unggah '); // label photo upload
                $('#form_pelatihan div').text('(Tidak ada )');
            }
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
            url : base_url+"index/pelatihan_delete_data/"+ id_pelatihan,
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
        url = base_url+"index/request_insert_data";
    } else {
        url = base_url+"index/request_update_data";
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
                window.location.reload();
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

function save_peserta_pelatihan()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'realisasi_peserta_pel') {
        url = base_url+"index/save_peserta_pelatihan";
    } else {
        url = base_url+"index/update_peserta_pelatihan";
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form_realisasi_peserta_pel').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_realisasi_peserta_pel').modal('hide');
                reload_table();
                table_rel_pel.ajax.reload(null, false);
                window.location.reload();
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

function save_peserta_pelatihan_gaps()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'update_gapss') {
        url = base_url+"index/gaps_update_data";
    } else {
        alert('error url!');
    }

    // ajax adding data to database

    var formData = new FormData($('#form_gaps')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_realisasi_peserta_pel').modal('hide');
                $('#modal_form_gaps').modal('hide');
                reload_table();
                table_rel_pel.ajax.reload(null, false);
                window.location.reload();
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
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding or update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}