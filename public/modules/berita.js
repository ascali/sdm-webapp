var save_method; //for save method string
var table;
var base_url = 'http://localhost/sdm/';

$(document).ready(function(){

     table = $('#berita').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": base_url+"administrator/berita_data",
                        "type": "POST"
                    },
            "aoColumns": [
                            {
                                "data": "judul"
                            },
                            {
                                "data": "isi"
                            },
                            {
                              "data": null,
                              "mRender": function(data, type, row){
                              var gambar_berita = row.gambar_berita;
                              var file_gambar_berita = gambar_berita ? '<img src="'+base_url+'public/images/'+gambar_berita+'" class="img-responsive" style="width:50%;">' : '';
                              file_gambar_berita += file_gambar_berita == '' ? 'Tidak Ada Gambar' : '';
                              return file_gambar_berita;
                              }
                            },
                            {
                                "data": "created"
                            },
                            {
                                "data": "updated"
                            },
                            {
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_berita = row.id_berita;
                                    var action = edit ? '<a href="#" onclick="edit('+id_berita+',true);"><button class="btn btn-sm btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id_berita+',true);"><button class="btn btn-sm btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'Tidak ada aksi' : '';
                                    return action;
                                }
                            }
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
    $('.modal-title').text('Form Input Berita'); // Set Title to Bootstrap modal title
    $('#gambar_berita').hide(); // hide photo preview modal
    $('#label-gambar').text('Unggah Gambar'); // label photo upload
    $('#btnSave').text('Save');
}

function edit(id_berita)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.update-button').text('Update');


    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"administrator/berita_edit_data/" + id_berita,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_berita"]').val(dataRow.data.id_berita);
            $('[name="judul"]').val(dataRow.data.judul);
            $('[name="isi"]').val(dataRow.data.isi);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Berita'); // Set title to Bootstrap modal title

            $('#gambar_berita').show(); // show photo preview modal

            if(dataRow.data.gambar_berita)
            {
                $('#label-gambar').text('Ganti Gambar'); // label photo upload
                $('#gambar_berita div').html('<img src="'+base_url+'public/images/'+dataRow.data.gambar_berita+'" class="img-responsive" width="30%">'); // show photo
                $('#gambar_berita div').append('<input type="checkbox" name="remove_gambar_berita" value="'+dataRow.data.gambar_berita+'"/> Centang gambar jika di ingin dihapus'); // remove photo
                $('#modalFixed').addClass('modal-bodys');
            }
            else
            {
                $('#label-gambar').text('Unggah Gambar'); // label photo upload
                $('#gambar_berita div').text('(Tidak ada gambar)');
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
        url = base_url+"administrator/berita_insert_data";
    } else {
        url = base_url+"administrator/berita_update_data";
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

function del(id_berita)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : base_url+"administrator/berita_delete/"+ id_berita,
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
