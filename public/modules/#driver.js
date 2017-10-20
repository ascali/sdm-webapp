var save_method; //for save method string
var table;
var urlGlobal = 'http://localhost/';

$(document).ready(function(){

	 table = $('#driver').DataTable( {
		"processing": true,
		"order": [],
			"ajax": {
						"url": urlGlobal+"control/driver_data",
				        "type": "POST"
		        	},
		    "aoColumns": [	
                            {
                                "data": "company"
                            },
                            {
                                "data": "name"
                            },
                            {
                                "data": "birth_place"
                            },
                            {
                                "data": "birth_date"
                            },
                            {
                                "data": "address"
                            },
                            {
                                "data": "phone",
                            },
                            {
                                "data": "email",
                            },
                            {
                                "data": "lisence_id",
                            },
                            {
                                "data": "status",
                            },
			    			{
                                "data": null,
                                "mRender": function(data, type, row){
                                    var id_driver = row.id_driver;
                                    var action = edit ? '<a href="#" onclick="edit('+id_driver+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                                    action += edit && del ? '&nbsp;&nbsp;' : '';
                                    action += del ? '<a href="#" onclick="del('+id_driver+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                                    action += action == '' ? 'No Action' : '';
                                    return action;  
                                }
			    			}
			       			// {
			       			// 	"targets": -1,
			       			// 	"defaultContent": "<button class='btn btn-xs btn-info' onclick='test()'>edit</button><button class='btn btn-xs btn-danger' onclick='test()'>delete</button>"
			       			// }
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
    $('.modal-title').text('Form Input driver'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

}

function edit(id_driver)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#btnSave').text('Update');

    //Ajax Load data from ajax
    $.ajax({
        url : urlGlobal+"control/driver_edit_data/" + id_driver,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {

            $('[name="id_driver"]').val(dataRow.data.id_driver);
            $('[name="company"]').val(dataRow.data.company);
            $('[name="name"]').val(dataRow.data.name);
            $('[name="birth_place"]').val(dataRow.data.birth_place);
            $('[name="birth_date"]').val(dataRow.data.birth_date);
            $('[name="address"]').val(dataRow.data.address);
            $('[name="phone"]').val(dataRow.data.phone);
            $('[name="email"]').val(dataRow.data.email);
            $('[name="lisence_id"]').val(dataRow.data.lisence_id);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Form Edit driver'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del(id_driver)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : urlGlobal+"control/driver_delete_data/"+ id_driver,
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
        url = urlGlobal+"control/driver_insert_data";
    } else {
        url = urlGlobal+"control/driver_update_data";
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
