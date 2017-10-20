var base_url = 'http://localhost/sdm/';
var isiBerita = "" ;

// data: arrThnPerJml.map(Number),

$(document).ready(function () {
    var dapegName = [], dapegY = [], a = [];
    $.getJSON(base_url+'index/dashboard_data', function(dataDash){

        // $dapeg = dataDash.data;
        // for (var i = 0; i < $dapeg.length; i++) {
        //     dapegName.push($dapeg[i].status_kom);
        //     dapegY.push($dapeg[i].count_peg);
        for (var l = dataDash.data.length - 1; l >= 0; l--) {
            // dapegName.push(dataDash.data[l].name);
            // dapegY.push(dataDash.data[l].y);

            var abc = {name: dataDash.data[l].name, y: dataDash.data[l].y};
            a.push(abc);
        }
        // Build the chart
        Highcharts.chart('scontainer', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Status Kepegawaian'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Pegawai',
                colorByPoint: true,
                data: a
            }]
        });
    });

/*    $.getJSON(base_url+'index/berita_data', function(isiBeritas){
        var data = isiBeritas.data;
        for (var i = 0; i < data.length; i++) {
            var str = data[i].isi;
            var res = str.substring(0, 450);
            isiBerita += '<li>'+
                            '<i class="fa fa-clock-o bg-aqua"></i>'+

                            '<div class="timeline-item">'+
                              '<span class="time"><i class="fa fa-clock-o"></i> '+data[i].created+'</span>'+
                              '<h3 class="timeline-header"><a href="#">'+data[i].judul+'</a></h3>'+
                              '<div class="timeline-body">'+
                                // 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...'+
                                
                                '<div class="col-md-3">'+
                                '<img class="img-responsive img-round" src="'+base_url+'public/images/'+data[i].gambar_berita+'" alt="User profile picture">'+
                                '</div>'+

                                ''+res+'...<br>'+

                              '</div>'+

                              '<div class="timeline-footer">'+
                                '<a class="btn btn-primary btn-xs" onclick="read_more('+data[i].id_berita+')">Read more</a>'+
                              '</div>'+

                            '</div>'+
                          '</li>';
        }
        $('#isiBerita').append(isiBerita);
    });*/
    
});

$(document).ready(function (){
        $.getJSON(base_url+'index/dashboard_berita_data', function(isiBeritas){
        var data = isiBeritas.data;
        for (var i = 0; i < data.length; i++) {
            var str = data[i].isi;
            var res = str.substring(0, 450);
            isiBerita += '<li>'+
                            '<i class="fa fa-clock-o bg-aqua"></i>'+

                            '<div class="timeline-item">'+
                              '<span class="time"><i class="fa fa-clock-o"></i> '+data[i].created+'</span>'+
                              '<h3 class="timeline-header"><a href="#">'+data[i].judul+'</a></h3>'+
                              '<div class="timeline-body">'+
                                // 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo...'+
                                
                                '<div class="col-md-3">'+
                                '<img class="img-responsive img-round" src="'+base_url+'public/images/'+data[i].gambar_berita+'" alt="User profile picture">'+
                                '</div>'+

                                ''+res+'...<br>'+

                              '</div>'+

                              '<div class="timeline-footer">'+
                                '<a class="btn btn-primary btn-xs" onclick="read_more('+data[i].id_berita+')">Read more</a>'+
                              '</div>'+

                            '</div>'+
                          '</li>';
        }
        $('#isiBerita').append(isiBerita);
    });
});



function read_more(id_berita)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.update-button').text('Update');


    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index/berita_edit_data/" + id_berita,
        type: "GET",
        dataType: "JSON",
        success: function(dataRow)
        {
            $('.judul').text(dataRow.data.judul);
            var isi = '<div class="col-md-12">'+
                        '<img class="img-responsive img-round" src="'+base_url+'public/images/'+dataRow.data.gambar_berita+'" alt="User profile picture">'+
                      '</div>'+dataRow.data.isi;
            $('.isi').html(isi);

            $('[name="id_berita"]').val(dataRow.data.id_berita);
            $('[name="judul"]').val(dataRow.data.judul);
            $('[name="isi"]').val(dataRow.data.isi);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Berita'); // Set title to Bootstrap modal title

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