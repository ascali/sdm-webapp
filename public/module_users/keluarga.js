var save_method; //for save method string
var table;
var urlGlobal = 'http://localhost/sdm/';
var selPeg = "", selNak = "";
$(document).ready(function(){

	 table = $('#keluarga').DataTable( {
		"processing": true,
		"order": [],
			"ajax": {
						"url": urlGlobal+"administrator/keluarga_data",
				        "type": "POST"
		        	},
		    "aoColumns": [	
                            {
                                "data": "nama_pegawai"
                            },
                            {
                                "data": "status"
                            },
                            {
                                "data": "nama_pasangan"
                            },
                            {
                                "data": "tempat_lahir"
                            },
                            {
                                "data": "tanggal_lahir"
                            },
                            {
                                "data": "nama_anak"
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
                                    var id_keluarga = row.id_keluarga;
                                    var action = edit ? '<a href="#" onclick="edit('+id_keluarga+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id_keluarga+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
			    			}
					   ]
	});

     $.getJSON(urlGlobal+'administrator/pegawai_data', function(daPeg){
        console.log(daPeg.data);
        $('#id_pegawai').append('<option selected disabled>-- Pilih Pegawai --</option>');
        var data = daPeg.data;
        for (var i = 0; i < data.length; i++) {
            selPeg += '<option value="'+data[i].id_pegawai+'">'+data[i].nama+'</option>';
        }
        $('#id_pegawai').append(selPeg);
     });

     $.getJSON(urlGlobal+'administrator/anak_data', function(daNak){
        console.log(daNak.data);
        $('#id_anak').append('<option selected disabled>-- Pilih Anak --</option>');
        var data = daNak.data;
        for (var i = 0; i < data.length; i++) {
            selNak += '<option value="'+data[i].id_anak+'">'+data[i].nama_anak+'</option>';
        }
        $('#id_anak').append(selNak);
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
    $('.modal-title').text('Form Input Keluarga'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

}

function edit(id_keluarga)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : urlGlobal+"administrator/keluarga_edit_data/" + id_keluarga,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_keluarga"]').val(dataRow.data.id_keluarga);
            $('[name="id_pegawai"]').val(dataRow.data.id_pegawai);
            $('[name="status"]').val(dataRow.data.status);
            $('[name="nama_pasangan"]').val(dataRow.data.nama_pasangan);
            $('[name="tempat_lahir"]').val(dataRow.data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(dataRow.data.tanggal_lahir);
            $('[name="id_anak"]').val(dataRow.data.id_anak);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Keluarga'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del(id_keluarga)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : urlGlobal+"administrator/keluarga_delete_data/"+ id_keluarga,
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
        url = urlGlobal+"administrator/keluarga_insert_data";
    } else {
        url = urlGlobal+"administrator/keluarga_update_data";
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
