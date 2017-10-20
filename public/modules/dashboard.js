var base_url = 'http://localhost/sdm/';

// data: arrThnPerJml.map(Number),

$(document).ready(function () {
    var dapegName = [], dapegY = [], a = [];
    $.getJSON(base_url+'administrator/dashboard_data', function(dataDash){

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

    var  a2 = [];
    $.getJSON(base_url+'administrator/dashboard_data2', function(dataDash2){

        // $dapeg = dataDash2.data;
        // for (var i = 0; i < $dapeg.length; i++) {
        //     dapegName.push($dapeg[i].status_kom);
        //     dapegY.push($dapeg[i].count_peg);
        for (var l = dataDash2.data.length - 1; l >= 0; l--) {
            // dapegName.push(dataDash2.data[l].name);
            // dapegY.push(dataDash2.data[l].y);

            var abc2 = {name: dataDash2.data[l].name, y: dataDash2.data[l].y};
            a2.push(abc2);
        }
        // Build the chart
        Highcharts.chart('scontainers2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Status Bidang Kepegawaian'
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
                data: a2
            }]
        });
    });

});