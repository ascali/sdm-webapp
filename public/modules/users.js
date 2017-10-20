var save_method; //for save method string
var table, selStatKep = "";
var base_url = 'http://localhost/sdm/';

$(document).ready(function(){

	 table = $('#users').DataTable( {
		"processing": true,
		"order": [],
			"ajax": {
						"url": base_url+"administrator/users_data",
				        "type": "POST"
		        	},
		    "aoColumns": [	
                            {
                                "data": "username"
                            },
                            {
                                "data": "password"
                            },
                            {
                                "data": "level"
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
                                    var id_admin = row.id_admin;
                                    var action = edit ? '<a href="#" onclick="edit('+id_admin+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id_admin+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
			    			}
					   ]
	});

     $.getJSON(base_url+'administrator/pegawai_data', function(datStatKep){
        console.log(datStatKep.data);
        $('#id_pegawai').append('<option selected disabled>-- Pilih Pegawai --</option>');
        var data = datStatKep.data;
        for (var i = 0; i < data.length; i++) {
            selStatKep += '<option value="'+data[i].id_pegawai+'">NIS: '+data[i].nid+' | Nama: '+data[i].nama+'</option>';
        }
        $('#id_pegawai').append(selStatKep);
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
    $('.modal-title').text('Form Input Users'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

}

function edit(id_admin)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"administrator/users_edit_data/" + id_admin,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_admin"]').val(dataRow.data.id_admin);
            $('[name="username"]').val(dataRow.data.username);
            $('[name="password"]').val(dataRow.data.password);
            $('[name="level"]').val(dataRow.data.level);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit Users'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del(id_admin)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : base_url+"administrator/users_delete_data/"+ id_admin,
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
        url = base_url+"administrator/users_insert_data";
    } else {
        url = base_url+"administrator/users_update_data";
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
                    // var statIn =  data.error_string[i];
                    // console.log("apa ini hmm "+statIn);
                    // if (statIn == 'harus di isi' || statIn == 'data sudah ada') {
                    //     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    //     $('[name="'+data.inputerror[i]+'"]').notify( data.error_string[i], "warn", { position:"bottom" } );                       
                    // } else {
                    //     $('[name="'+data.inputerror[i]+'"]').parent().parent().removeClass('has-error').parent().parent().addClass('has-primary');
                    //     $.notify( ' '+data.error_string[i]+' ', "info", { position: 'center', style: 'bootstrap' } );
                    // }
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

            // alert('Success Saving Data Nasabah');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding or update data');
            $.notify("Terjadi Sesuatu yang salah", "warn");
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
