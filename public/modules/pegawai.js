var save_method, save_methods, save_methodk; //for save method string
var table, tables;
var base_url = 'http://localhost/sdm/';
var selBid = "", selVel = "", selPen = "", selStatKep = "";
$(document).ready(function(){

     table = $('#pegawai').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": base_url+"administrator/pegawai_data",
                        "type": "POST"
                    },
            "aoColumns": [
                            {
                                "data": "nid"
                            },
                            {
                                "data": "nama"
                            },
                            {
                                "data": "devisi"
                            },
                            {
                                "data": "shift"
                            },
                            {
                                "data": "nama_bidang"
                            },
                            {
                                "data": "level_jabatan"
                            },
                            {
                                "data": "pendidikan_terakhir"
                            },
                            /*{
                              "data": null,
                              "mRender": function(data, type, row){
                              var foto_pegawai = row.foto;
                              var file_foto_pegawai = foto_pegawai ? '<img src="'+base_url+'public/images/'+foto_pegawai+'" class="img-responsive" style="width:50%;">' : '';
                              file_foto_pegawai += file_foto_pegawai == '' ? 'Tidak Ada Photo' : '';
                              return file_foto_pegawai;
                              }
                            },*/
                            {
                                "data": "created"
                            },
                            {
                                "data": "updated"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id = row.id_pegawai;
                                    var action = edit ? '<div class="btn-group"><a href="#" onclick="edit('+id+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += del && det ? '&nbsp;&nbsp;' : '';
                                    action += det ? '<a href="#" onclick="det('+id+',true);"><button class="btn btn-xs btn-info">Detail</button></a> </div>' : '';
                                    
                                    action += action == '' ? 'No Action' : '';
                                    return action;
                                }
                            }
                       ]
    });

     $.getJSON(base_url+'administrator/status_data', function(datStatKep){
        console.log(datStatKep.data);
        $('#id_status').append('<option selected disabled>-- Pilih Status Kepegawaian --</option>');
        var data = datStatKep.data;
        for (var i = 0; i < data.length; i++) {
            selStatKep += '<option value="'+data[i].id_status+'">'+data[i].status_kepegawaian+'</option>';
        }
        $('#id_status').append(selStatKep);
     });

     $.getJSON(base_url+'administrator/bidang_data', function(daBid){
        console.log(daBid.data);
        $('#id_bidang').append('<option selected disabled>-- Pilih Bidang --</option>');
        var data = daBid.data;
        for (var i = 0; i < data.length; i++) {
            selBid += '<option value="'+data[i].id_bidang+'">'+data[i].nama_bidang+'</option>';
        }
        $('#id_bidang').append(selBid);
     });

     $.getJSON(base_url+'administrator/level_data', function(daVel){
        console.log(daVel.data);
        $('#id_level').append('<option selected disabled>-- Pilih Level Jabatan --</option>');
        var data = daVel.data;
        for (var i = 0; i < data.length; i++) {
            selVel += '<option value="'+data[i].id_level+'">'+data[i].level_jabatan+'</option>';
        }
        $('#id_level').append(selVel);
     });

     $.getJSON(base_url+'administrator/pendidikan_data', function(daPen){
        console.log(daPen.data);
        $('#id_pendidikan').append('<option selected disabled>-- Pilih pendidikan Terakhir --</option>');
        var data = daPen.data;
        for (var i = 0; i < data.length; i++) {
            selPen += '<option value="'+data[i].id_pendidikan+'">'+data[i].pendidikan_terakhir+'</option>';
        }
        $('#id_pendidikan').append(selPen);
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
    $('.modal-title').text('Form Input Pegawai'); // Set Title to Bootstrap modal title
    $('#foto').hide(); // hide photo preview modal
    $('#label-photo').text('Unggah Foto'); // label photo upload
    $('#btnSave').text('Save');
}

function edit(id_pegawai)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.update-button').text('update');


    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"administrator/pegawai_edit_data/" + id_pegawai,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            $('[name="nid"]').val(dataRow.data.nid);
            $('[name="nama"]').val(dataRow.data.nama);
            $('[name="id_status"]').val(dataRow.data.id_status);
            $('[name="status_perkawinan"]').val(dataRow.data.status_perkawinan);
            $('[name="grade"]').val(dataRow.data.grade);
            $('[name="skala"]').val(dataRow.data.skala);
            $('[name="devisi"]').val(dataRow.data.devisi);
            $('[name="shift"]').val(dataRow.data.shift);
            $('[name="id_bidang"]').val(dataRow.data.id_bidang);
            $('[name="id_level"]').val(dataRow.data.id_level);
            $('[name="id_pendidikan"]').val(dataRow.data.id_pendidikan);
            $('[name="alamat"]').val(dataRow.data.alamat);
            $('[name="tempat_lahir"]').val(dataRow.data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(dataRow.data.tanggal_lahir);
            $('[name="tanggal_masuk"]').val(dataRow.data.tanggal_masuk);
            $('[name="tetap"]').val(dataRow.data.tetap);
            $('[name="no_telp"]').val(dataRow.data.no_telp);
            $('[name="email"]').val(dataRow.data.email);
            $('[name="no_rekening"]').val(dataRow.data.no_rekening);
            $('[name="npwp"]').val(dataRow.data.npwp);
            $('[name="cost_center"]').val(dataRow.data.cost_center);
            $('[name="agama"]').val(dataRow.data.agama);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Pegawai'); // Set title to Bootstrap modal title

            $('#foto').show(); // show photo preview modal

            if(dataRow.data.foto)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#foto div').html('<img src="'+base_url+'public/images/'+dataRow.data.foto+'" class="img-responsive" width="30%">'); // show photo
                $('#foto div').append('<input type="checkbox" name="remove_foto" value="'+dataRow.data.foto+'"/> Centang gambar jika di ingin dihapus'); // remove photo
                $('#modalFixed').addClass('modal-bodys');
            }
            else
            {
                $('#label-photo').text('Unggah Foto'); // label photo upload
                $('#foto div').text('(Tidak ada gambar)');
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function det(id_pegawai)
{
    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"administrator/pegawai_edit_data/" + id_pegawai,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            var data = '<tr><td>Nid</td><td>'+dataRow.data.nid+'</td></tr>'+
                       '<tr><td>Nama</td><td>'+dataRow.data.nama+'</td></tr>'+
                       // '<tr><td>Status Kepegawaian</td><td>'+dataRow.data.status_kepegawaian+'</td></tr>'+
                       '<tr><td>Grade</td><td>'+dataRow.data.grade+'</td></tr>'+
                       '<tr><td>Skala</td><td>'+dataRow.data.skala+'</td></tr>'+
                       '<tr><td>Devisi</td><td>'+dataRow.data.devisi+'</td></tr>'+
                       '<tr><td>Shift</td><td>'+dataRow.data.shift+'</td></tr>'+
                       '<tr><td>Bidang</td><td>'+dataRow.data.nama_bidang+'</td></tr>'+
                       '<tr><td>Level Jabatan</td><td>'+dataRow.data.level_jabatan+'</td></tr>'+
                       '<tr><td>Pendidikan</td><td>'+dataRow.data.pendidikan_terakhir+'</td></tr>'+
                       '<tr><td>Alamat</td><td>'+dataRow.data.alamat+'</td></tr>'+
                       '<tr><td>Tempat Lahir</td><td>'+dataRow.data.tempat_lahir+'</td></tr>'+
                       '<tr><td>Tanggal Lahir</td><td>'+dataRow.data.tanggal_lahir+'</td></tr>'+
                       '<tr><td>Tanggal Masuk</td><td>'+dataRow.data.tanggal_masuk+'</td></tr>'+
                       '<tr><td>Tetap</td><td>'+dataRow.data.tetap+'</td></tr>'+
                       '<tr><td>No. Telpon</td><td>'+dataRow.data.no_telp+'</td></tr>'+
                       '<tr><td>Email</td><td>'+dataRow.data.email+'</td></tr>'+
                       '<tr><td>No. Tekening</td><td>'+dataRow.data.no_rekening+'</td></tr>'+
                       '<tr><td>No. NPWP</td><td>'+dataRow.data.npwp+'</td></tr>'+
                       '<tr><td>Cost Center</td><td>'+dataRow.data.cost_center+'</td></tr>'+
                       '<tr><td>Agama</td><td>'+dataRow.data.agama+'</td></tr>';
            $('#detail').html(data);

            var dataFoto = '<img class="img-rounded" src="'+base_url+'public/images/'+dataRow.data.foto+'" alt="User Avatar">';
            $('#imgPhoto').html(dataFoto);

            var btnKelUp = '<a href="#" class="btn btn-default btn-block" id="update_kel" onclick="edit_keluarga('+dataRow.data.id_pegawai+')"><b>Update Data Keluarga</b></a>'+
                            '<a href="#" class="btn btn-default btn-block" id="add_kel" onclick="add_keluarga()"><b>Tambah Data Keluarga</b></a>';
            $('#btnKel').html(btnKelUp);

            /*$('[name="nid"]').val(dataRow.data.nid);
            $('[name="nama"]').val(dataRow.data.nama);
            $('[name="status_kepegawaian"]').val(dataRow.data.status_kepegawaian);
            $('[name="grade"]').val(dataRow.data.grade);
            $('[name="skala"]').val(dataRow.data.skala);
            $('[name="devisi"]').val(dataRow.data.devisi);
            $('[name="shift"]').val(dataRow.data.shift);
            $('[name="id_bidang"]').val(dataRow.data.id_bidang);
            $('[name="id_level"]').val(dataRow.data.id_level);
            $('[name="id_pendidikan"]').val(dataRow.data.id_pendidikan);
            $('[name="alamat"]').val(dataRow.data.alamat);
            $('[name="tempat_lahir"]').val(dataRow.data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(dataRow.data.tanggal_lahir);
            $('[name="tanggal_masuk"]').val(dataRow.data.tanggal_masuk);
            $('[name="tetap"]').val(dataRow.data.tetap);
            $('[name="no_telp"]').val(dataRow.data.no_telp);
            $('[name="email"]').val(dataRow.data.email);
            $('[name="no_rekening"]').val(dataRow.data.no_rekening);
            $('[name="npwp"]').val(dataRow.data.npwp);
            $('[name="cost_center"]').val(dataRow.data.cost_center);
            $('[name="agama"]').val(dataRow.data.agama);*/

            $('#modal_form_detail').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Pegawai'); // Set title to Bootstrap modal title

            $('#foto').show(); // show photo preview modal
            
            if (dataRow.data.status_perkawinan == '0') {
                $('#kel123').hide();
                $('#ank123').hide();
            } else {
                $('#kel123').show();
                $('#ank123').show();
            }

            if(dataRow.data.foto)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#foto div').html('<img src="'+base_url+'public/images/'+dataRow.data.foto+'" class="img-responsive" width="30%">'); // show photo
                $('#foto div').append('<input type="checkbox" name="remove_foto" value="'+dataRow.data.foto+'"/> Centang gambar jika di ingin dihapus'); // remove photo
                $('#modalFixed').addClass('modal-bodys');
            }
            else
            {
                $('#label-photo').text('Unggah Foto'); // label photo upload
                $('#foto div').text('(Tidak ada gambar)');
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    
    /*Ajax Load Data Keluarga*/
     // Detail Keluarga 
     var statusPasangan = "", nama_pasangan, tempat_lahir_p = "", tanggal_lahir_p = "";
     $.getJSON(base_url+'administrator/data_keluarga_data/'+id_pegawai, function(detailKel){
        var data = detailKel.data;
        console.log('sdas '+data.length);
        if (data.length == 0) {
            $('#add_kel').show();
            $('#update_kel').hide();
        } else {
            $('#update_kel').show();
            $('#add_kel').hide();
        }

        for (var i = 0; i < data.length; i++) {
            statusPasangan = data[i].status; 
            nama_pasangan = data[i].nama_pasangan;
            tempat_lahir_p = data[i].tempat_lahir_k;
            tanggal_lahir_p = data[i].tanggal_lahir_k;
        }
        $('#statusPasangan').html(statusPasangan);
        $('#nama_pasangan').html(nama_pasangan);
        $('#tempat_lahir_p').html(tempat_lahir_p);
        $('#tanggal_lahir_p').html(tanggal_lahir_p);
     });
    /*End Ajax Load Data Keluarga*/
    /*Ajax Load Data Anak*/
     tables = $('#data_anak').DataTable( {
        "processing": true,
        "retrieve": true,
        "order": [],
            "ajax": {
                        "url": base_url+"administrator/data_anak_data/"+id_pegawai,
                        "type": "POST"
                    },
            "aoColumns": [
                            {
                                "data": "anakke"
                            },
                            {
                                "data": "nama_anak"
                            },
                            {
                                "data": "tempat_lahir_a"
                            },
                            {
                                "data": "tanggal_lahir_a"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_anak = row.id_anak;
                                    var action = edit ? '<a href="#" onclick="edit_anak('+id_anak+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                                                        
                                    action += action == '' ? 'No Action' : '';
                                    return action;
                                }
                            }
                       ]
    });
    /*End Load Data Anak*/

    $.getJSON(base_url+'administrator/data_pegawai_data/'+id_pegawai, function(detailPegawai){
        var data = detailPegawai.data;
        console.log('asdv '+ data[0].id_pegawai);
        $('[name="id_pegawaia"]').val(data[0].id_pegawai);
        $('[name="id_pegawais"]').val(data[0].id_pegawai);
    });

}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = base_url+"administrator/pegawai_insert_data";
    } else {
        url = base_url+"administrator/pegawai_update_data";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
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
                $('#modal_form').modal('hide');
                alert('Sukses menyimpan data');
                reload_table();
                if (save_method == 'update') {
                    window.location.reload();
                }
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    var statIn =  data.error_string[i];
                    console.log("apa ini hmm "+statIn);
                    
                    if (statIn == 'data sudah ada' ) {  
                            swal({
                                    title: data.error_string[i],
                                    type: "info",
                                    text: "Masukn NID Yang Berbeda",
                                    confirmButtonClass: "btn-sm btn-info",
                                    confirmButtonText: "Ganti NID!"
                                });                   
                    }

                    if (statIn == 'harus di isi' || statIn == 'data sudah ada') {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        // $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        // $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                        $('[name="'+data.inputerror[i]+'"]').notify( data.error_string[i], "warn", { position:"bottom" } );
                    } else {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().removeClass('has-error').parent().parent().addClass('has-primary');
                        $.notify( ' '+data.error_string[i]+' ', "info", { position: 'center', style: 'bootstrap' } );
                    }
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $.notify("Terjadi Sesuatu yang salah", "warn");
            // alert('Error adding or update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function del(id_pegawai)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : base_url+"administrator/pegawai_delete/"+ id_pegawai,
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

// Anak
function add_anak()
{
    save_methods = 'add_anak';
    $('#form_anak')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_anak').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Input Anak'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

    $.getJSON(base_url+'administrator/data_pegawai_data', function(detailPegawai){
        var data = detailPegawai.data;
        console.log('asdv '+data[0].id_pegawai);
        $('[name="id_pegawaia"]').val(data[0].id_pegawai);
    });
}

function edit_anak(id_anak)
{
    save_methods = 'update';
    $('#form_anak')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"administrator/anak_edit_data/" + id_anak,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_anak"]').val(dataRow.data.id_anak);
            $('[name="id_pegawaia"]').val(dataRow.data.id_pegawai);
            $('[name="anakke"]').val(dataRow.data.anakke);
            $('[name="nama_anak"]').val(dataRow.data.nama_anak);
            $('[name="tempat_lahir_a"]').val(dataRow.data.tempat_lahir);
            $('[name="tanggal_lahir_a"]').val(dataRow.data.tanggal_lahir);
            $('#modal_form_anak').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Anak'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del_anak(id_anak)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : base_url+"administrator/anak_delete_data/"+ id_anak,
            type: "POST",
            dataType: "JSON",
            success: function(dataRow)
            {
                //if success reload ajax table
                $('#modal_form_anak').modal('hide');
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

function save_anak()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_methods == 'add_anak') {
        url = base_url+"administrator/anak_insert_data";
    } else {
        url = base_url+"administrator/anak_update_data";
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form_anak').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_anak').modal('hide');
                alert('Sukses menyimpan data');
                reload_table();
                tables.ajax.reload(null, false);
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

// Keluarga
function add_keluarga()
{
    save_methodk = 'add_kel';
    $('#form_keluarga')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_keluarga').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Input Keluarga'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

    $.getJSON(base_url+'administrator/data_pegawai_data', function(detailPegawai){
        var data = detailPegawai.data;
        console.log('asdv '+data[0].id_pegawai);
        $('[name="id_pegawais"]').val(data[0].id_pegawai);
    });
}

function edit_keluarga(id_pegawai)
{
    save_methodk = 'update';
    $('#form_keluarga')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"administrator/data_keluarga_edit_data/"+id_pegawai,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            console.log(dataRow.data);
            $('[name="id_pegawais"]').val(dataRow.data.id_pegawai);
            $('[name="id_keluargas"]').val(dataRow.data.id_keluarga);
            $('[name="statuss"]').val(dataRow.data.status);
            $('[name="nama_pasangans"]').val(dataRow.data.nama_pasangan);
            $('[name="tempat_lahirs"]').val(dataRow.data.tempat_lahir_k);
            $('[name="tanggal_lahirs"]').val(dataRow.data.tanggal_lahir_k);
            $('#modal_form_keluarga').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Keluarga'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save_keluarga()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_methodk == 'add_kel') {
        url = base_url+"administrator/keluarga_insert_data";
    } else {
        url = base_url+"administrator/keluarga_update_data";
    }

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form_keluarga').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_keluarga').modal('hide');
                alert('Sukses menyimpan data');
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