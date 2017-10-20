var save_method; //for save method string
var table;
var base_url = 'http://localhost/sdm/';
$(document).ready(function(){

     table = $('#data_anak').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": base_url+"index/data_anak_data",
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
                                "data": "tempat_lahir"
                            },
                            {
                                "data": "tanggal_lahir"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id = row.id_anak;
                                    var action = edit ? '<a href="#" onclick="edit_anak('+id+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                                                        
                                    action += action == '' ? 'No Action' : '';
                                    return action;
                                }
                            }
                       ]
    });

    /* $.getJSON(base_url+'index/bidang_data', function(daBid){
        console.log(daBid.data);
        $('#id_bidang').append('<option selected disabled>-- Pilih Bidang --</option>');
        var data = daBid.data;
        for (var i = 0; i < data.length; i++) {
            selBid += '<option value="'+data[i].id_bidang+'">'+data[i].nama_bidang+'</option>';
        }
        $('#id_bidang').append(selBid);
     });

     $.getJSON(base_url+'index/level_data', function(daVel){
        console.log(daVel.data);
        $('#id_level').append('<option selected disabled>-- Pilih Level Jabatan --</option>');
        var data = daVel.data;
        for (var i = 0; i < data.length; i++) {
            selVel += '<option value="'+data[i].id_level+'">'+data[i].level_jabatan+'</option>';
        }
        $('#id_level').append(selVel);
     });

     $.getJSON(base_url+'index/pendidikan_data', function(daPen){
        console.log(daPen.data);
        $('#id_pendidikan').append('<option selected disabled>-- Pilih pendidikan Terakhir --</option>');
        var data = daPen.data;
        for (var i = 0; i < data.length; i++) {
            selPen += '<option value="'+data[i].id_pendidikan+'">'+data[i].pendidikan_terakhir+'</option>';
        }
        $('#id_pendidikan').append(selPen);
     });*/

    // Detail Pegawai Profil
     var namaPeg = "", level_jabatan = "", agama = "", devisi = "";
     var pendidikan_terakhir = "", alamat = "", email = "", status_kepegawaian = "", status_perkawinan = "";
     var nid = "", tempat_lahir = "", tanggal_lahir = "", skala = "", grade = "";
     var no_telp = "", no_rekening = "", npwp = "", cost_center = "", shift = "", foto = "";
     $.getJSON(base_url+'index/data_pegawai_data', function(detailPegawai){
        var data = detailPegawai.data;

        for (var i = 0; i < data.length; i++) {
            console.log();
            namaPeg = data[i].nama;
            level_jabatan = data[i].level_jabatan;
            agama = data[i].agama;
            devisi = data[i].devisi;
            pendidikan_terakhir = data[i].pendidikan_terakhir;
            alamat = data[i].alamat;
            email = data[i].email;
            status_kepegawaian = data[i].status_kepegawaian;
            status_perkawinan = data[i].status_perkawinan;
            nid = data[i].nid;
            tempat_lahir = data[i].tempat_lahir;
            tanggal_lahir = data[i].tanggal_lahir;
            skala = data[i].skala;
            grade = data[i].grade;
            no_telp = data[i].no_telp;
            no_rekening = data[i].no_rekening;
            npwp = data[i].npwp;
            cost_center = data[i].cost_center;
            shift = data[i].shift;
            foto = '<img class="profile-user-img img-responsive img-circle" src="'+base_url+'public/images/'+data[i].foto+'" alt="User profile picture">';
        }

        $('#namaPeg').html(namaPeg);
        $('.namaPeg').html(namaPeg);
        $('#level_jabatan').html(level_jabatan);
        $('#agama').html(agama);
        $('.agama').html(agama);
        $('#status_perkawinan').html(status_perkawinan);
        $('#devisi').html(devisi);
        $('#pendidikan_terakhir').html(pendidikan_terakhir);
        $('#alamat').html(alamat);
        $('#email').html(email);
        $('#status_kepegawaian').html(status_kepegawaian);
        $('#nid').html(nid);
        $('#tempat_lahir').html(tempat_lahir);
        $('#tanggal_lahir').html(tanggal_lahir);
        $('#skala').html(skala);
        $('#grade').html(grade);
        $('#no_telp').html(no_telp);
        $('#no_rekening').html(no_rekening);
        $('#npwp').html(npwp);
        $('#cost_center').html(cost_center);
        $('#shift').html(shift);
        $('#fotos').html(foto);

        if (status_perkawinan == '0') {
            $('#kel123').hide();
            $('#ank123').hide();
        } else {
            $('#kel123').show();
            $('#ank123').show();
        }

     });

     // Detail Keluarga 
     var statusPasangan = "", nama_pasangan, tempat_lahir_p = "", tanggal_lahir_p = "";
     $.getJSON(base_url+'index/data_keluarga_data', function(detailKel){
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
});

function reload_table()
{
  // window.location.reload()
  table.ajax.reload(null,false); //reload datatable ajax
}

// Keluarga
function add_keluarga()
{
    save_method = 'add';
    $('#form_keluarga')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_keluarga').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Input Keluarga'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

    $.getJSON(base_url+'index/data_pegawai_data', function(detailPegawai){
        var data = detailPegawai.data;
        console.log('asdv '+data[0].id_pegawai);
        $('[name="id_pegawais"]').val(data[0].id_pegawai);
    });
}

function edit_keluarga(id_pegawai)
{
    save_method = 'update';
    $('#form_keluarga')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/data_keluarga_edit_data/"+id_pegawai,
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

    if(save_method == 'add') {
        url = base_url+"index/keluarga_insert_data";
    } else {
        url = base_url+"index/keluarga_update_data";
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

// Anak
function add_anak()
{
    save_method = 'add';
    $('#form_anak')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_anak').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Input Anak'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

    $.getJSON(base_url+'index/data_pegawai_data', function(detailPegawai){
        var data = detailPegawai.data;
        console.log('asdv '+data[0].id_pegawai);
        $('[name="id_pegawaia"]').val(data[0].id_pegawai);
    });
}

function edit_anak(id_anak)
{
    save_method = 'update';
    $('#form_anak')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/anak_edit_data/" + id_anak,
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
            url : base_url+"index/anak_delete_data/"+ id_anak,
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

    if(save_method == 'add') {
        url = base_url+"index/anak_insert_data";
    } else {
        url = base_url+"index/anak_update_data";
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

// Pegawai

function edit(id_pegawai)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.update-button').text('update');


    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/data_pegawai_edit_data/"+id_pegawai,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            $('[name="nid"]').val(dataRow.data.nid);
            $('[name="nama"]').val(dataRow.data.nama);
            $('[name="status_kepegawaian"]').val(dataRow.data.status_kepegawaian);
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
            $('.modal-title').text('Form Updata'); // Set title to Bootstrap modal title

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

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = base_url+"index/pegawai_insert_data";
    } else {
        url = base_url+"index/pegawai_update_data";
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