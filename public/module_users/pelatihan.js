var save_method; //for save method string
var table;
var urlGlobal = 'http://localhost/sdm/';

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
                                "data": "id_pelatihan"
                            },
                            {
                                "data": "nid"
                            },
                            {
                                "data": "nama"
                            },
                            {
                                "data": "judul"
                            },
                            {
                                "data": "lembaga_pelatihan"
                            },
                            {
                                "data": "pelaksanaan_awal"
                            },
                             {
                                "data": "pelaksanaan_akhir"
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
            $('[name="nid"]').val(dataRow.data.nid);
            $('[name="nama"]').val(dataRow.data.nama);
            $('[name="judul"]').val(dataRow.data.judul);
            $('[name="lembaga_pelatihan"]').val(dataRow.data.judul);
            $('[name="pelaksanaan_awal"]').val(dataRow.data.pelaksanaan_awal);
            $('[name="pelaksanaan_akhir"]').val(dataRow.data.pelaksanaan_akhir);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Pelatihan'); // Set title to Bootstrap modal title

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
