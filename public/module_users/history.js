var save_method; //for save method string
var table;
var urlGlobal = 'http://localhost/sdm/';

$(document).ready(function(){

     table = $('#hist').DataTable( {
        "processing": true,
        "order": [],
            "ajax": {
                        "url": urlGlobal+"index/history_pelatihan_data",
                        "type": "POST"
                    },
            "aoColumns": [  
                            {
                                "data": "judul_pelatihan"
                            },
                            {
                                "data": "lembaga_pelatihan"
                            },
                            {
                                "data": "pelaksanaan_awal"
                            },
                            {
                                "data": "nama_sertifikasi"
                            },
                            {
                                "data": "tanggal_expired_akhir"
                            },
                            {
                                "data": "status_history"
                            },
                            // {
                            //     "data": null,
                            //     "mRender": function(data, type, row){
                            //         var id_level = row.id_level;
                            //         var action = edit ? '<a href="#" onclick="edit('+id_level+',true);"><button class="btn btn-xs btn-warning">&nbsp; Edit &nbsp;</button></a>' : '';
                            //         action += edit && del ? '&nbsp;&nbsp;' : '';
                            //         action += del ? '<a href="#" onclick="del('+id_level+',true);"><button class="btn btn-xs btn-danger">Delete</button></a>' : '';
                            //         action += action == '' ? 'No Action' : '';
                            //         return action;  
                            //     }
                            // }
                       ]
    });

});

function reload_table()
{
  // window.location.reload()
  table.ajax.reload(null,false); //reload datatable ajax 
}