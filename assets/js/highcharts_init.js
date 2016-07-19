$(function () {
    var chart;
    $(document).ready(function() {
    Highcharts.setOptions({
        colors: ['#32353A']
    });
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column',
                margin: [ 50, 30, 80, 60]
            },
            title: {
                text: 'ปีงบประมาณ'
            },
            xAxis: {
                categories: [
				
                    'หลักสูตร',
                    '',
                    '14-03-2012',
                    '15-03-2012',
                    '16-03-2012',
                    '17-03-2012'
              
                ],
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '9px',
                        fontFamily: 'Tahoma, Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวนโครงการวิจัย'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Visits: '+ Highcharts.numberFormat(this.y, 0);
                }
            },
                series: [{
                name: 'Visits',
                data: [1134, 1029, 1626, 2210, 1019, 
                   ],
                dataLabels: {
                    enabled: false,
                    rotation: 0,
                    color: '#F07E01',
                    align: 'right',
                    x: -3,
                    y: 20,
                    formatter: function() {
                        return this.y;
                    },
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }, 
                pointWidth: 20
            }]
        });
    });
    
});
