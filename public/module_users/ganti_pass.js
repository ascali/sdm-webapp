
var urlGlobals = 'http://localhost/sdm/';

function gantipass()
{
    $('#form_pass')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_pass').modal('show'); // show bootstrap modal
    $('.modal-title').text('Form Ganti Password'); // Set Title to Bootstrap modal title
    $('#btnSave').text('Save');

}

function reload_tables()
{
  // window.location.reload()
  // window.location.href = url+'login/logout' //reload datatable ajax 
  console.log('hmm');
}


function ganti_passw()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    url = urlGlobals+"index/gantipass";

    $.ajax({
        url : url,
        type: 'POST',
        data: $('#form_pass').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_pass').modal('hide');
                reload_tables();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            console.log(data);
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
